<?php

use App\Http\Controllers\AlamatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\TokoProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;

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

// login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');

// verification akun
// Route::get('/email/verify', [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware('auth', 'signed')->name('verification.verify');
// Route::post('/email/resend-verify', [VerificationController::class, 'resend'])->middleware('auth', 'throttle:6,1')->name('verification.send');

// product
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{product:slug}', [ProductController::class, 'show']);

// profile
Route::get('/editProfile', [UserController::class, 'edit'])->middleware('auth');
Route::put('/editProfile', [UserController::class, 'update'])->middleware('auth');

// alamat
Route::get('/alamat', [AlamatController::class, 'index'])->middleware('auth');
Route::get('/alamat/tambah', [AlamatController::class, 'create'])->middleware('auth');
Route::post('/alamat', [AlamatController::class, 'store'])->middleware('auth');
Route::get('/alamat/{alamat:id}/edit', [AlamatController::class, 'edit'])->middleware('auth');
Route::put('/alamat/{alamat:id}', [AlamatController::class, 'update'])->middleware('auth');
Route::delete('/alamat/{alamat:id}', [AlamatController::class, 'destroy'])->middleware('auth');

// keranjang
Route::post('/keranjang/create', [KeranjangController::class, 'store'])->middleware('auth');
Route::get('/keranjang', [KeranjangController::class, 'index'])->middleware('auth');
Route::put('/keranjang/update', [KeranjangController::class, 'update'])->middleware('auth');
Route::delete('/keranjang/delete', [KeranjangController::class, 'destroy'])->middleware('auth');

// favorit
Route::get('/favorit', [FavoritController::class, 'index'])->middleware('auth');
Route::post('/favorit/create', [FavoritController::class, 'store'])->middleware('auth');
Route::delete('/favorit/delete', [FavoritController::class, 'destroy'])->middleware('auth');

// admin
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('is_admin')->name('dashboard');


// toko
Route::get('/toko', [TokoController::class, 'index'])->middleware('is_toko');
Route::get('/toko/create', [TokoController::class, 'create'])->middleware('auth');
Route::post('/toko/create', [TokoController::class, 'store'])->middleware('auth');
Route::get('/toko/{toko:slug}/edit', [TokoController::class, 'edit'])->middleware('is_toko');
Route::put('/toko/{toko:slug}', [TokoController::class, 'update'])->middleware('is_toko');
Route::get('/toko/{toko:slug}/editBack', [TokoController::class, 'editBack'])->middleware('is_toko');
Route::put('/toko/{toko:slug}/editBack', [TokoController::class, 'updateBack'])->middleware('is_toko');
Route::get('/{toko:slug}', [TokoController::class, 'show'])->middleware('auth');
Route::resource('/toko/product', TokoProductController::class)->middleware('is_toko');
