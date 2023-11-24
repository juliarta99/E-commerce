<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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

   public function cekResi(Delivery $delivery)
   {
        if(isset(Auth::user()->toko->id)) {
            if($delivery->id_toko != Auth::user()->toko->id)
            {
                return redirect()->route('toko')->with('error', 'Terjadi Kesalahan!');
            }
        } else {
            if($delivery->transaksi->user->id != Auth::user()->id)
            {
                return redirect()->route('transaksi')->with('error', 'Terjadi Kesalahan!');
            }
        }

        $result = Http::get("https://api.binderbyte.com/v1/track", [
            "api_key" => "8b921c644831187ddbe3a6d5037ce264f21531c3ad48ec805b930d65b957c96d",
            "courier" => $delivery->kurir,
            "awb" => $delivery->no_resi
        ]);
        dd($result);
        // belum selesai
   }
}
