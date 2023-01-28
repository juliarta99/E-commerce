<?php

use App\Http\Controllers\AlamatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [LoginController::class, 'create'])->middleware('guest');
Route::post('/register', [LoginController::class, 'store'])->middleware('guest');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{product:slug}', [ProductController::class, 'show']);

Route::get('/editProfile', [ProfileController::class, 'edit'])->middleware('auth');
Route::put('/editProfile', [ProfileController::class, 'update'])->middleware('auth');

Route::post('/alamat', [AlamatController::class, 'store'])->middleware('auth');
