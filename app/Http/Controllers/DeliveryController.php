<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
   public function updateResi(Request $request, Delivery $delivery)
   {
        if($delivery->id_toko != Auth::user()->toko->id){
            return redirect()->route('toko')->with('error', 'Terjadi Kesalahan!');
        }

        $validate = $request->validate([
            'no_resi' => 'required'
        ]);

        $delivery->update(['no_resi' => $validate['no_resi']]);
        return back()->with('success', 'Nomor Resi berhasil ditambahkan!');
   }
}
