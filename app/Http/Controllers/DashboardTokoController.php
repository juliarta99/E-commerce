<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class DashboardTokoController extends Controller
{
    public function approve()
    {
        $title = 'Dashboard | Toko Approve';
        $tokos  = Toko::where('approve', 0)->with('city')->get();
        return view('dashboard.toko.approve', compact('tokos', 'title'));
    }

    public function approveToko(Request $request)
    {
        Toko::where('slug', $request->slug)->update(['approve' => 1]);
        return back()->with('success', 'Toko berhasil disetujui untuk berjualan!');
    }
}
