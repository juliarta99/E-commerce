<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class TokoProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toko.product.create',
        [
            'title' => 'Create Product',
            'kategoris' => Kategori::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'id_toko' => 'required',
            'id_kategori' => 'required',
            'harga_awal' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'image' => 'nullable|file|image|max:1024',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'deskripsi' => 'required'
        ]);
        $validateData['potongan'] = $request->harga_awal - $request->harga;
        $validateData['diskon'] = $validateData['potongan'] / $request->harga_awal * 100;
        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('product-images');
        }
        
        Product::create($validateData);
        return redirect('/toko')->with('succes', 'Product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('toko.product.show',
        [
            'title' => $product->name,
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('toko.product.edit',
        [
            'title' => 'Edit'. $product->name,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $creadentials = $request->validate([

        ]);

        Product::where('id', $product->id)->update($creadentials);
        return redirect('/toko')->with('succes', 'Product berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy('id', $product->id);
        return redirect('/login')->with('succes', 'Product berhasil dihapus');
    }
}
