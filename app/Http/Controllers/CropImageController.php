<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropImageController extends Controller
{
    public function index()
    {
        return view('cropImage');
    }
}
