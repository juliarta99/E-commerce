<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Alamat;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.index');
    }

    public function ongkir(Request $request)
    {
        $alamat = Alamat::find($request->tujuan);
        $ongkirs = collect([]);
        $beratProducts = collect([]);

        $tokoId = null;
        foreach (Auth::user()->keranjangs as $keranjang) {
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
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
