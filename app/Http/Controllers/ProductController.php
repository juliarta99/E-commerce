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
                ->where('stok', '>', 0)->where('show', 1)
                ->filter(request(['search']))->paginate(10);
        return view('products', compact('title', 'products'));
    }

    public function show(Product $product)
    {   
        if(!$product->show) {
            return redirect()->route('home')->with('error', 'Terjadi kesalahan!');
        }
        $title = $product->name;
        $cComment=0;$c5=0;$c4=0;$c3=0;$c2=0;$c1=0;$c0=0;
        if(Product::where('id', $product->id)->with('transaksis.comment')->whereHas('transaksis.comment')->exists()){
            $cComment = Product::where('id', $product->id)->whereHas('transaksis.comment', function($q) {
                $q->where('rate', '>=', "0");
            })->count();
            $c5 = Product::where('id', $product->id)->whereHas('transaksis.comment', function($q) {
                $q->where('rate', "5");
            })->count();
            $c4 = Product::where('id', $product->id)->whereHas('transaksis.comment', function($q) {
                $q->where('rate', '>=', "4")->where('rate', '<', "5");
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
        }

        $avgToko=0;
        if(Product::where('id_toko', $product->toko->id)->with('transaksis.comment')->whereHas('transaksis.comment')->exists()){
            $products = Product::where('id_toko', $product->toko->id)->with('transaksis', 'transaksis.comment')->get();
            $avgToko = $products->flatMap(function ($product) {
                return $product->transaksis->flatMap(function ($transaksi) {
                    if($transaksi->comment){
                        return [$transaksi->comment->rate];
                    }
                });
            })->avg();
        }
        return view('product', compact('title', 'product', 'cComment', 'c5', 'c4', 'c3', 'c2', 'c1', 'c0', 'avgToko'));
    }
}
