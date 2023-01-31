<?php

use App\Http\Controllers\AlamatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokoController;

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

Route::get('/toko', [TokoController::class, 'index'])->middleware('is_toko');
Route::get('/toko/create', [TokoController::class, 'create'])->middleware('auth');
Route::post('/toko/create', [TokoController::class, 'store'])->middleware('auth');
Route::get('/toko/{toko:slug}/edit', [TokoController::class, 'edit'])->middleware('is_toko');
Route::put('/toko/{toko:slug}', [TokoController::class, 'update'])->middleware('is_toko');
Route::get('/toko/{toko:slug}/editBack', [TokoController::class, 'editBack'])->middleware('is_toko');
Route::put('/toko/{toko:slug}/editBack', [TokoController::class, 'updateBack'])->middleware('is_toko');
Route::resource('/toko/product', TokoProductController::class)->middleware('is_toko');


Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{product:slug}', [ProductController::class, 'show']);

Route::get('/editProfile', [ProfileController::class, 'edit'])->middleware('auth');
Route::put('/editProfile', [ProfileController::class, 'update'])->middleware('auth');

Route::post('/alamat', [AlamatController::class, 'store'])->middleware('auth');
