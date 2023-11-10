<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardKategoriController extends Controller
{
    public function index()
    {
        $title = 'All Kategori';
        $kategoris = Kategori::all();
        return view('dashboard.kategori.index', compact('title', 'kategoris'));
    }
}
