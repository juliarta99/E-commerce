<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'E-commerce';
        $products = Product::latest()->with('kategori', 'toko', 'toko.city', 'transaksis', 'transaksis.comment')
            ->whereHas('toko', function($query){
                $query->where('approve', true);
            })
            ->where('stok', '>', 0)->paginate(5);
        return view('welcome', compact('products', 'title'));
    }
}