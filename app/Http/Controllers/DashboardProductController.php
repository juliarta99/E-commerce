<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    public function index()
    {
        $title = 'All Product';
        $products = Product::all();
        return view('dashboard.product.index', compact('title', 'products'));
    }
}
