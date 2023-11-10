<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardDeliveryController extends Controller
{
    public function index()
    {
        $title = 'All Delivery';
        $deliverys = Delivery::all();
        return view('dashboard.delivery.index', compact('title', 'deliverys'));
    }
}
