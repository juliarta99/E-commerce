<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Toko;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        return view('products',
        [
            'title' => 'All Products',
            'products' => Product::latest()->with('kategori')->filter(request(['search']))->get(),
        ]);
    }

    public function show(Product $product)
    {
        return view('product', 
        [
            'title' => $product->name,
            'product' => $product,
            'toko' => Auth::user()->toko->id,
            'keranjang' => Auth::user()->keranjangs->where('id_product', $product->id),
            'favorit' => Auth::user()->favorits->where('id_toko', $product->toko->id),
        ]);
    }
}
