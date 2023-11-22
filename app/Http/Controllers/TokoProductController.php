<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        if(Auth::user()->toko->approve == 0) {
            return redirect(route('home'))->with('error', 'Toko belum disetujui untuk berjualan!');
        }
        $validateData = $request->validate([
            'name' => 'required',
            'stok' => 'required|numeric',
            'id_kategori' => 'required',
            'harga_awal' => 'required|numeric',
            'harga' => 'required|numeric',
            'berat' => 'required|numeric',
            'image' => 'required|file|image|max:1024',
            'deskripsi' => 'required'
        ]);
        if($request->harga > $request->harga_awal){
            return back()->withInput()->withErrors(['harga' => 'The price cannot be greater than the initial price!']);
        }
        $validateData['id_toko'] = Auth::user()->toko->id;
        $validateData['potongan'] = $request->harga_awal - $request->harga;
        $validateData['diskon'] = $validateData['potongan'] / $request->harga_awal * 100;
        $validateData['image'] = $request->file('image')->store('product-images');
        
        Product::create($validateData);
        return redirect(route('toko'))->with('success', 'Product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if($product->id_toko != Auth::user()->toko->id){
            return redirect(route('toko'))->with('error', 'Product tidak ditemukan');
        }

        $title = $product->name;
        return view('toko.product.show', compact('title', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if($product->id_toko != Auth::user()->toko->id){
            return redirect(route('toko'))->with('error', 'Product tidak ditemukan');
        }
        $title = 'Edit '. $product->name;
        $kategoris = Kategori::all();
        return view('toko.product.edit', compact('title', 'kategoris', 'product'));
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
        if($product->id_toko != Auth::user()->toko->id){
            return redirect(route('toko'))->with('error', 'Terjadi kesalahan!');
        }
        $validateData = $request->validate([
            'name' => 'required|max:50',
            'stok' => 'required|numeric',
            'id_kategori' => 'required',
            'harga_awal' => 'required|numeric',
            'harga' => 'required|numeric',
            'berat' => 'required|numeric',
            'image' => 'file|image|max:1024',
            'deskripsi' => 'required'
        ]);
        if($request->harga > $request->harga_awal){
            return back()->withInput()->withErrors(['harga' => 'The price cannot be greater than the initial price!']);
        }
        $validateData['potongan'] = $request->harga_awal - $request->harga;
        $validateData['diskon'] = $validateData['potongan'] / $request->harga_awal * 100;
        
        if($request->file('image')) {
            if($product->image) {
                Storage::delete($product->image);
            }
            $validateData['image'] = $request->file('image')->store('product-images');
        }
        $product->slug = null;
        $product->update($validateData);
        return redirect(route('toko'))->with('success', 'Product berhasil diedit');
    }

    public function updateShow(Product $product)
    {
        if($product->id_toko != Auth::user()->toko->id){
            return redirect()->route('toko')->with('error', 'Terjadi kesalahan!');
        }
        $product->update(['show' => !$product->show]);
        return redirect()->route('toko')->with('success', 'Product berhasil di perbaharui!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(count($product->transaksis) > 0) {
            return redirect()->route('toko')->with('error', 'Terjadi kesalahan!');
        }
        Product::destroy('id', $product->id);
        return redirect()->route('toko')->with('success', 'Product berhasil dihapus!');
    }
}
