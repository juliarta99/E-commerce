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

    public function show(Product $product)
    {
        $title = "Product - $product->name";
        return view('dashboard.product.show', compact('title', 'product'));
    }

    public function updateShow(Product $product)
    {
        $product->update(['show' => !$product->show]);
        return redirect()->route('dashboard.product')->with('success', 'Product berhasil di perbaharui!');
    }
}
