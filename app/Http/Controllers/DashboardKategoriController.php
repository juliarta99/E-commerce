<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardKategoriController extends Controller
{
    public function index()
    {
        $title = 'All Kategori';
        $kategoris = Kategori::with('products')->get();
        return view('dashboard.kategori.index', compact('title', 'kategoris'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required'
        ]);

        Kategori::create($validateData);
        return redirect()->route('dashboard.kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(Kategori $kategori)
    {
        $title = "Edit Kategori - $kategori->name";
        return view('dashboard.kategori.edit', compact('title', 'kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validateData = $request->validate([
            'name' => 'required'
        ]);

        $kategori->update($validateData);
        return redirect()->route('dashboard.kategori')->with('success', 'Kategori berhasil diedit!');
    }

    public function destroy(Kategori $kategori)
    {
        if(count($kategori->products) > 0) {
            return redirect()->route('dashboard.kategori')->with('error', 'Terjadi Kesalahan!');
        }
        $kategori->delete();
        return redirect()->route('dashboard.kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}
