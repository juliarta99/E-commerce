<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Test\Constraint\RequestAttributeValueSame;

class TokoController extends Controller
{
    public function index()
    {
        return view('toko.index',
        [
            'title' => 'Toko Saya',
            'products' => Product::where('id_toko', Auth::user()->toko->id)->get(),
        ]);
    }

    public function create()
    {
        if(Auth::user()->is_toko == true){
            return redirect('/toko')->with('sudahBuatToko', 'Anda sudah memiliki toko');
        }
        
        return view('toko.create', 
        [
            'title' => 'Membuat toko',
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:50',
            'alamat' => 'required',
            'tentang' => 'required',
            'image' => 'file|image|max:1024',
            'id_user' => 'required'
        ]);

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
        return redirect('/toko')->with('succes', 'Toko berhasil dibuat');
    }

    public function edit(Toko $toko)
    {
        return view('toko.edit',
        [
            'title' => 'Edit Toko',
            'toko' => $toko
        ]);
    }

    public function update(Toko $toko, Request $request)
    {
        $validateData = $request->validate([
            'name' =>  'required|max:50',
            'name' => 'required|max:50',
            'alamat' => 'required',
            'tentang' => 'required',
            'image' => 'file|image|max:1024',
        ]);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('toko-profile-images');
        };

        Toko::where('id', $toko->id)->update($validateData);
        return redirect('/toko')->with('succes', 'Toko berhasil diedit');
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
            if($request->oldBackImage) {
                Storage::delete($request->oldBackImage);
            }
            $validateData['backImage'] = $request->file('backImage')->store('back-toko-images');
        }
        
        Toko::where('id', $toko->id)->update($validateData);
        return redirect('/toko')->with('succes', 'Background toko berhasil diganti');
        
    }
}
