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
        $cComment = Product::where('id', $product->id)->whereHas('transaksis.comment', function($q) {
            $q->where('rate', '>=', "0");
        })->count();
        $c5 = Product::where('id', $product->id)->whereHas('transaksis.comment', function($q) {
            $q->where('rate', "5");
        })->count();
        $c4 = Product::where('id', $product->id)->whereHas('transaksis.comment', function($q) {
            $q->where('rate', '>=', "4")->orWhere('rate', '<', "5");
        })->count();
        $c3 = Product::where('id', $product->id)->whereHas('transaksis.comment', function($q) {
            $q->where('rate', '>=', "3")->where('rate', '<', "4");
        })->count();
        $c2 = Product::where('id', $product->id)->whereHas('transaksis.comment', function($q) {
            $q->where('rate', '>=', "2")->where('rate', '<', "3");
        })->count();
        $c1 = Product::where('id', $product->id)->whereHas('transaksis.comment', function($q) {
            $q->where('rate', '>=', "1")->where('rate', '<', "2");
        })->count();
        $c0 = Product::where('id', $product->id)->whereHas('transaksis.comment', function($q) {
            $q->where('rate', '>=', "0")->where('rate', '<', "1");
        })->count();
        return view('product', compact('title', 'product', 'cComment', 'c5', 'c4', 'c3', 'c2', 'c1', 'c0',));
    }
}
