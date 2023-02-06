<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'E-commerce';
        $products = Product::latest()->with('kategori')->filter(request(['search']))->get();
        return view('welcome', compact('products', 'title'));
    }
}