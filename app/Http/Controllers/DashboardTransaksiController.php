<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardTransaksiController extends Controller
{
    public function index()
    {
        $title = 'All Transaction';
        $transaksis = Transaksi::all();
        return view('dashboard.transaksi.index', compact('title', 'transaksis'));
    }
}
