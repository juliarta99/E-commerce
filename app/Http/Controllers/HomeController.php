<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'E-commerce';
        $products = Product::latest()->with('kategori', 'toko', 'toko.city')
            ->whereHas('toko', function($query){
                $query->where('approve', true);
            })
            ->filter(request(['search']))->get();
        return view('welcome', compact('products', 'title'));
    }
}