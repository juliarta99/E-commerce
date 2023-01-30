<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TokoController extends Controller
{
    public function index()
    {
        return view('toko.index',
        [
            'title' => 'Toko Saya'
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
            $validateData['image'] = $request->file('image')->store('toko-images');
        }
        
        Toko::create($validateData);
        
        $toko = Toko::where('id', $request->id_user)->get();
        if($toko != null) {
            User::where('id', Auth::user()->id)->update([
                'is_toko' => 1,
            ]);
        }
        return redirect('/toko')->with('succesBuatToko', 'Toko berhasil dibuat');
    }
}
