<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('product', 
        [
            'title' => $product->name,
            'product' => $product,
        ]);
    }
}
