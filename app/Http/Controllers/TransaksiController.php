<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Alamat;
use App\Models\Delivery;
use App\Models\DetailTransaksi;
use App\Models\Keranjang;
use App\Models\Toko;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Transaksi Anda';
        $transaksis = Transaksi::where('id_user', Auth::user()->id)->with('deliverys')->get();
        return view('transaksi.index', compact('title', 'transaksis'));
    }

    public function lokasi()
    {
        return view('transaksi.lokasi');
    }

    public function ongkir(Request $request)
    {
        $alamat = Alamat::find($request->tujuan);
        $ongkirs = collect([]);
        $beratProducts = collect([]);
        $keranjangs = Keranjang::where('id_user', Auth::user()->id)->whereHas('product.toko', function ($query) {
            $query->orderBy('name', 'ASC');
        })->get();

        $tokoId = null;
        foreach ($keranjangs as $keranjang) {
            if ($tokoId !== $keranjang->product->toko->id) {
                $beratProducts->push(['id_toko' => $keranjang->product->toko->id,
                                    'berat' => $keranjang->product->berat * $keranjang->kuantitas]);
            } else {
                $index = $beratProducts->search(function ($item) use ($tokoId) {
                    return $item['id_toko'] === $tokoId;
                });
        
                if ($index !== false) {
                    $beratProducts->put($index, [
                        'id_toko' => $tokoId,
                        'berat' => $beratProducts->get($index)['berat'] + ($keranjang->product->berat * $keranjang->kuantitas)
                    ]);
                }
            }
            $tokoId = $keranjang->product->toko->id;
        }

        foreach($beratProducts as $beratAndIdToko){
            $toko = Toko::find($beratAndIdToko['id_toko']);
            $result = Http::withHeaders([
                'key' => 'e6cfadb803301e9908ad6edc670b5783'
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $toko->city->city_id,
                'destination' => $alamat->city->city_id,
                'weight' => $beratAndIdToko['berat'],
                'courier' => $request->kurir
            ]);
            $ongkirs->push([
                'id_toko' => $toko->id,
                'results' => $result['rajaongkir']['results'][0]
            ]);
        }

        return view('transaksi.ongkir', compact('ongkirs', 'alamat'));
    }

    public function checkout(Request $request)
    {
        $alamat = Alamat::with('city')->find($request->tujuan);
        $kurir = $request->kurir;
        $ongkirs = collect([]);
        $keranjangs = Keranjang::where('id_user', Auth::user()->id)->whereHas('product.toko', function ($query) {
            $query->orderBy('name', 'ASC');
        })->get();

        $tokoId = null;
        foreach ($keranjangs as $keranjang) {
            if ($tokoId !== $keranjang->product->toko->id) {
                $ongkirs->push([
                    'id_toko' => $keranjang->product->toko->id,
                    'ongkir' => json_decode($request['ongkir-'.$keranjang->product->toko->id])
                ]);
            }
            $tokoId = $keranjang->product->toko->id;
        }

        return view('transaksi.checkout', compact('ongkirs', 'alamat', 'kurir'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alamat = Alamat::with('city')->find($request->tujuan);
        $ongkirs = collect([]);
        $keranjangs = Keranjang::where('id_user', Auth::user()->id)->whereHas('product.toko', function ($query) {
                            $query->orderBy('name', 'ASC');
                        })->get();

        $tokoId = null;
        foreach ($keranjangs as $keranjang) {
            if($keranjang->kuantitas > $keranjang->product->stok) {
                return redirect()->route('keranjang')->with('error', "Terjadi kesalahan pada saat menambahkan transaksi!\nMohon periksa kembali kuantitas keranjang apakah lebih dari stok yang tersedia!");
            }
            if ($tokoId != $keranjang->product->toko->id) {
                $ongkirs->push([
                    'id_toko' => $keranjang->product->toko->id,
                    'ongkir' => json_decode($request['ongkir-'.$keranjang->product->toko->id])
                ]);
            }
            $tokoId = $keranjang->product->toko->id;
        }
        
        $now = Carbon::now();
        $kd_transaksi = $now->year.$now->month.$now->day.strtoupper(uniqid());
        $subtotal = $keranjangs->sum(function ($keranjang) {
            return $keranjang->kuantitas * $keranjang->product->harga_awal;
        });
        $total_beli = $keranjangs->sum(function ($keranjang) {
            return $keranjang->kuantitas * $keranjang->product->harga;
        });
        $total_ongkir = $ongkirs->sum(function ($ongkir) {
            return $ongkir['ongkir']->cost[0]->value;
        });
        $total_transaksi = $total_beli + $total_ongkir;

        $transaksi = Transaksi::create([
            'kd' => $kd_transaksi,
            'id_user' => Auth::user()->id,
            'subtotal' => $subtotal,
            'total_beli' => $total_beli,
            'total_ongkir' => $total_ongkir,
            'total_transaksi' => $total_transaksi,
        ]);

        $prevToko = null;
        foreach($keranjangs as $keranjang) {
            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id,
                'id_product' => $keranjang->product->id,
                'product_name' => $keranjang->product->name,
                'harga_awal' => $keranjang->product->harga_awal,
                'harga' => $keranjang->product->harga,
                'kuantitas' => $keranjang->kuantitas
            ]);

            $ongkir = $ongkirs->where('id_toko', $keranjang->product->toko->id)->first();
            if($ongkir && $ongkir['id_toko'] != $prevToko) {
                Delivery::create([
                    'id_transaksi' => $transaksi->id,
                    'id_toko' => $keranjang->product->toko->id,
                    'origin_province' => $keranjang->product->toko->city->province_name,
                    'origin_city' => $keranjang->product->toko->city->city_name,
                    'origin_postal_code' => $keranjang->product->toko->city->postal_code,
                    'destination_province' => $alamat->city->province_name,
                    'destination_city' => $alamat->city->city_name,
                    'destination_postal_code' => $alamat->city->postal_code,
                    'destination_detail' => $alamat->detail,
                    'catatan' => $alamat->catatan,
                    'kurir' => $request->kurir,
                    'service' => $ongkir['ongkir']->service,
                    'estimation' => $ongkir['ongkir']->cost[0]->etd,
                    'cost' => $ongkir['ongkir']->cost[0]->value,
                ]);
                $prevToko = $keranjang->product->toko->id;
            }

            $keranjang->delete();
        }

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
        $params = [
            'transaction_details' => [
                'order_id' => $transaksi->kd,
                'gross_amount' => $transaksi->total_transaksi,
            ],
            'customer_details' => [
                'first_name' => $transaksi->user->name,
                'last_name' => '',
                'email' => $transaksi->user->email,
                'phone' => $transaksi->user->no_hp,
            ],
            "item_details" => []
        ];
        foreach ($transaksi->details as $detail) {
            $item = [
                'id' => $detail->product->slug,
                'price' => $detail->product->harga,
                'quantity' => $detail->kuantitas,
                'name' => $detail->product->name,
                'category' => $detail->product->kategori->name,
                'merchant_name' => $detail->product->toko->name,
                'url' => route('product.show', $detail->product->slug),
            ];
        
            $params['item_details'][] = $item;
        }
        $shippingCost = [
            'id' => 'shipping-cost',
            'price' => $transaksi->total_ongkir,
            'quantity' => 1,
            'name' => 'Shipping Cost'
        ];
        $params['item_details'][] = $shippingCost;

        $snapToken = Snap::getSnapToken($params);
        Transaksi::find($transaksi->id)->update(['snap' => $snapToken]);

        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        $title = 'Transaksi '.$transaksi->kd;
        return view('transaksi.show', compact('title', 'transaksi'));
    }

    public function invoice(Transaksi $transaksi)
    {
        return view('transaksi.invoice', compact('transaksi'));
    }

    public function handler(Request $request)
    {
        $signature = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.config('midtrans.server_key'));
        if($signature == $request->signature_key){
            if($request->transaction_status == "capture"){
                $transaksi = Transaksi::where('kd', $request->kd)->first();
                $transaksi->update([
                    'date_done' => Carbon::now(),
                    'status' => 'success'
                ]);
            }
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksiRequest  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
