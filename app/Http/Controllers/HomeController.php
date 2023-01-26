<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'E-commerce';
        $products = Product::latest()->with('kategori')->get();
        return view('welcome', compact('products', 'title'));
    }
}
