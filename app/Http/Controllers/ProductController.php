<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        return view('products',
        [
            'title' => 'All Products',
            'products' => Product::latest()->with('kategori')->get(),
        ]);
    }

    public function show(Product $product)
    {
        return view('product', 
        [
            'title' => $product->name,
            'product' => $product,
        ]);
    }
}
