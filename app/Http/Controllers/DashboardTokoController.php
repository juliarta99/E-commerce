<?php

namespace App\Http\Controllers;

use App\Models\Toko;

class DashboardTokoController extends Controller
{
    public function index()
    {
        $title = 'All Shop';
        $tokos = Toko::all();
        return view('dashboard.toko.index', compact('title', 'tokos'));
    }

    public function approve(Toko $toko)
    {
        $toko->update(['approve' => 1]);
        return back()->with('success', 'Toko berhasil disetujui untuk berjualan!');
    }

    public function notApprove(Toko $toko)
    {
        $toko->update(['approve' => 0]);
        return back()->with('success', 'Toko sekarang telah dilarang untuk berjualan!');
    }
}
