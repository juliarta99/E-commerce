<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Delivery;
use App\Models\Kategori;
use App\Models\Product;
use App\Models\Toko;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $cProduct = Product::all()->count();
        $cSTransaksi = Transaksi::where('status', 'success')->count();
        $cPTransaksi = Transaksi::where('status', 'pending')->count();
        $cSDelivery = Delivery::where('status', 'success')->count();
        $cPDelivery = Delivery::where('status', 'pending')->count();
        $cToko = Toko::all()->count();
        $cKategori = Kategori::all()->count();
        $cComment = Comment::all()->count();
        return view('dashboard.index', compact('title', 'cProduct', 'cSTransaksi', 'cPTransaksi', 'cSDelivery', 'cPDelivery', 'cToko', 'cKategori', 'cComment'));
    }
}
