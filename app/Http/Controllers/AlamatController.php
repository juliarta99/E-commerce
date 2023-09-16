<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlamatController extends Controller
{
    public function index()
    {
        return view('alamat.index', [
            'title' => 'Alamat Anda',
            'alamats' => Alamat::where('id_user', auth()->id())->get()
        ]);
    }

    public function create()
    {
        return view('alamat.tambah', [
            'title' => 'Tambah Alamat',
        ]);
    }
    
    public function store(Request $request)
    {
        $validateData = $request->validate([
                'penerima' => 'required|max:50',
                'label' => 'required|max:50',
                'kelurahan' => 'required|max:50',
                'kecamatan' => 'required|max:50',
                'kabupaten' => 'required|max:50',
                'provinsi' => 'required|max:50',
                'detail' => 'required',
                'catatan' => 'max:255',
                'no_hp' => 'required',
                'id_user' => 'required'
            ]);

        
            // 'id_user' => Auth::user()->id
        Alamat::create($validateData);
        return redirect('/alamat')->with('succesTambahAlamat', 'Alamat berhasil ditambahkan');
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
        
        return view('alamat.edit',
        [
            'title' => 'Edit Alamat',
            'alamat' => $alamat
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
            'label' => 'required|max:50',
            'kelurahan' => 'required|max:50',
            'kecamatan' => 'required|max:50',
            'kabupaten' => 'required|max:50',
            'provinsi' => 'required|max:50',
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
