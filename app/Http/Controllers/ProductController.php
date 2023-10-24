<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'All Products';
        $products = Product::latest()->with('kategori', 'toko', 'toko.city', 'transaksis', 'transaksis.comment')
                ->whereHas('toko', function($query){
                    $query->where('approve', true);
                })
                ->where('stok', '>', 0)
                ->filter(request(['search']))->get();
        return view('products', compact('title', 'products'));
    }

    public function show(Product $product)
    {   
        $title = $product->name;
        return view('product', compact('title', 'product'));
    }
}
