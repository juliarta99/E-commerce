<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DashboardDeliveryController extends Controller
{
    public function index()
    {
        $title = 'All Delivery';
        $deliverys = Delivery::all();
        return view('dashboard.delivery.index', compact('title', 'deliverys'));
    }

    public function show(Delivery $delivery)
    {
        $title = "Delivery $delivery->origin_city to $delivery->destination_city";
        $delivery = Delivery::where('id', $delivery->id)
        ->with(['transaksi.details' => function ($q) use ($delivery) {
            $q->where('id_transaksi', $delivery->transaksi->id)
              ->whereHas('product.toko', function ($q) use ($delivery) {
                  $q->where('id', $delivery->id_toko);
              });
        }])
        ->first();       
        return view('dashboard.delivery.show', compact('title', 'delivery'));
    }
}
