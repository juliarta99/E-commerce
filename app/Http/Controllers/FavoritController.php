<?php

namespace App\Http\Controllers;

use App\Models\Favorit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoritController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('favorit',
        [
            'title' => 'Favorit',
            'favorits' => Auth::user()->favorits,
        ]);
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
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(count(Auth::user()->favorits->where('id_toko', $request->id_toko)) == 1) {
            return back()->with('error', 'Toko sudah ada dalam favorit');
        }
        $validateData = $request->validate([
            'id_toko' => 'required',
        ]);
        $validateData['id_user'] = Auth::user()->id;

        Favorit::create($validateData);
        return back()->with('success', 'Toko berhasil ditambahkan ke dalam toko favorit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorit  $favorit
     * @return \Illuminate\Http\Response
     */
    public function show(Favorit $favorit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorit  $favorit
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorit $favorit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\Favorit  $favorit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorit $favorit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorit  $favorit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Favorit::destroy('id', $request->id_favorit);
        return back()->with('success', 'Toko berhasil dihapus dari favorit');
    }
}
