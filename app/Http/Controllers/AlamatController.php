<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlamatController extends Controller
{
    public function index()
    {
        $title = 'Alamat Anda';
        $alamats = Alamat::with('city')->where('id_user', auth()->id())->orderBy('id', 'DESC')->get();
        return view('alamat.index', compact('title', 'alamats'));
    }

    public function create()
    {
        $title = 'Tambah Alamat';
        $types = [
            ['value' => 'rumah', 
            'name' => 'Rumah'],
            ['value' => 'kantor', 
            'name' => 'Kantor'],
            ['value' => 'apartemen', 
            'name' => 'Apartemen'],
            ['value' => 'kos', 
            'name' => 'Kos'],
        ];
        $citys = City::orderBy('city_name', 'ASC')->get();
        return view('alamat.tambah', compact('title', 'types', 'citys'));
    }
    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'penerima' => 'required|max:50',
            'label' => 'required|in:rumah,kantor,apartemen,kos',
            'id_city' => 'required',
            'detail' => 'required',
            'catatan' => 'max:255',
            'no_hp' => 'required',
        ]);

        Alamat::create($validateData);
        return back()->with('success', 'Alamat berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function edit(Alamat $alamat)
    {
        if(Auth::user()->id != $alamat->id_user){
            return redirect('/alamat');
        }
        
        $types = [
            ['value' => 'rumah', 
            'name' => 'Rumah'],
            ['value' => 'kantor', 
            'name' => 'Kantor'],
            ['value' => 'apartemen', 
            'name' => 'Apartemen'],
            ['value' => 'kos', 
            'name' => 'Kos'],
        ];
        $citys = City::orderBy('city_name', 'ASC')->get();
        return view('alamat.edit',
        [
            'title' => 'Edit Alamat',
            'alamat' => $alamat,
            'citys' => $citys,
            'types' => $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alamat $alamat)
    {
        $creadentials = $request->validate([
            'penerima' => 'required|max:50',
            'label' => 'required|in:rumah,kantor,apartemen,kos',
            'id_city' => 'required',
            'detail' => 'required',
            'catatan' => 'max:255',
            'no_hp' => 'required',
        ]);

        Alamat::where('id', $alamat->id)->update($creadentials);
        return redirect('/alamat')->with('succes', 'Alamat berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alamat $alamat)
    {
        if(Auth::user()->id != $alamat->id_user){
            return redirect('/alamat');
        }

        Alamat::destroy('id', $alamat->id);
        return redirect('/alamat')->with('succes', 'Alamat berhasil dihapus');
    }
}
