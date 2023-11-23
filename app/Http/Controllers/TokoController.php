<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Delivery;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Transaksi;

class TokoController extends Controller
{
    public function index()
    {
        $title = 'Toko Saya';
        $products = Product::where('id_toko', Auth::user()->toko->id)->orderBy('id', 'DESC')->paginate(6);
        return view('toko.index', compact('title', 'products'));
    }

    public function create()
    {
        if(Auth::user()->is_toko == true){
            return redirect(route('toko'))->with('error', 'Anda sudah memiliki toko');
        }

        $title = 'Membuat Toko';
        $citys = City::orderBy('city_name', 'ASC')->get();
        return view('toko.create', compact('title', 'citys'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:50',
            'id_city' => 'required',
            'tentang' => 'required',
            'izin_usaha' => 'required|file|image|max:3000',
            'image' => 'file|image|max:1024',
        ]);
        $validateData['id_user'] = Auth::user()->id;
        $validateData['izin_usaha'] = $request->file('izin_usaha')->store('izin-usaha-images');
        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('toko-profile-images');
        };
        
        Toko::create($validateData);
        $toko = Toko::where('id', $request->id_user)->get();
        if($toko != null) {
            User::where('id', Auth::user()->id)->update([
                'is_toko' => 1,
            ]);
        }
        return redirect(route('toko'))->with('success', 'Toko berhasil dibuat');
    }

    public function edit(Toko $toko)
    {
        $title = 'Edit Toko';
        $citys = City::orderBy('city_name', 'ASC')->get();
        return view('toko.edit', compact('title', 'toko', 'citys'));
    }

    public function update(Toko $toko, Request $request)
    {
        $validateData = $request->validate([
            'name' =>  'required|max:50',
            'id_city' => 'required',
            'tentang' => 'required',
            'image' => 'file|image|max:1024',
        ]);

        if($request->file('image')) {
            if($toko->image) {
                Storage::disk('public')->delete($toko->image);
            }
            $validateData['image'] = $request->file('image')->store('toko-profile-images');
        };

        Toko::where('id', $toko->id)->update($validateData);
        return redirect(route('toko'))->with('success', 'Toko berhasil diedit');
    }

    public function editBack(Toko $toko)
    {
        return view('toko.editBack',
        [
            'title' => 'Edit Background Toko',
            'toko' => $toko
        ]);
    }

    public function updateBack(Toko $toko, Request $request) 
    {
        $validateData = $request->validate([
            'backImage' => 'required|file|image|max:1024'
        ]);

        if($request->file('backImage')) {
            if($toko->backImage) {
                Storage::delete($toko->backImage);
            }
            $validateData['backImage'] = $request->file('backImage')->store('back-toko-images');
        }
        
        Toko::where('id', $toko->id)->update($validateData);
        return redirect(route('toko'))->with('success', 'Background toko berhasil diganti');
        
    }

    public function show(Toko $toko)
    {
        if(auth()->check() && Auth::user()->is_toko != null) {
            if($toko->id == Auth::user()->toko->id) {
                return redirect(route('toko'));
            }
        }
        $title = $toko->name;
        $products = Product::where('id_toko', $toko->id)->where('show', 1)->where('approve', 1)->get();
        $avgToko=0;
        if(Product::where('id_toko', $toko->id)->with('transaksis.comment')->whereHas('transaksis.comment')->where('show', 1)->where('approve', 1)->exists()){
            $products = Product::where('id_toko', $toko->id)->with('transaksis', 'transaksis.comment')->where('show', 1)->where('approve', 1)->get();
            $avgToko = $products->flatMap(function ($product) {
                return $product->transaksis->flatMap(function ($transaksi) {
                    if($transaksi->comment){
                        return [$transaksi->comment->rate];
                    }
                });
            })->avg();
        }
        return view('toko', compact('title', 'toko', 'products', 'avgToko'));
    }

    public function transaksi()
    {
        $title = "All Transaction in Shop";
        $deliverys = Delivery::where('id_toko', Auth::user()->toko->id)->orderBy('created_at', 'DESC')
        ->with(['transaksi.details' => function ($q) {
            $q->whereHas('product.toko', function ($q) {
                  $q->where('id', Auth::user()->toko->id);
              });
        }])->get();
        return view('toko.transaksi.index', compact('title', 'deliverys'));
    }

    public function transaksiShow(Transaksi $transaksi)
    {
        $title = "Transaction ".$transaksi->kd;
        $delivery = Delivery::where('id_transaksi', $transaksi->id)
        ->with(['transaksi.details' => function ($q) {
            $q->whereHas('product.toko', function ($q) {
                  $q->where('id', Auth::user()->toko->id);
              });
        }])->first();
        return view('toko.transaksi.show', compact('title', 'delivery'));
    }
}
