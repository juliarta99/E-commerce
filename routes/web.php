<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlamatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardCommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDeliveryController;
use App\Http\Controllers\DashboardKategoriController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardTokoController;
use App\Http\Controllers\DashboardTransaksiController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\TokoProductController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

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
Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
    
    Route::get('/register', [AuthController::class, 'create'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.create');
});

Route::middleware('guest:admin')->group(function() {
    Route::get('/dashboard/login', [AdminController::class, 'login'])->name('dashboard.login');
    Route::post('/dashboard/login', [AdminController::class, 'authenticate'])->name('dashboard.authenticate');
});

Route::middleware('is_toko')->group(function() {
    Route::get('/toko', [TokoController::class, 'index'])->name('toko');
    Route::get('/toko/{toko:slug}/edit', [TokoController::class, 'edit'])->name('toko.edit');
    Route::put('/toko/{toko:slug}', [TokoController::class, 'update'])->name('toko.update');
    Route::get('/toko/{toko:slug}/editBack', [TokoController::class, 'editBack'])->name('toko.editBack');
    Route::put('/toko/{toko:slug}/editBack', [TokoController::class, 'updateBack'])->name('toko.updateBack');
    Route::resource('/toko/product', TokoProductController::class);
});

Route::middleware('is_admin')->group(function () {
    Route::prefix('dashboard')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/toko', [DashboardTokoController::class, 'index'])->name('dashboard.toko');
        Route::put('/toko/approve/{toko:slug}', [DashboardTokoController::class, 'approve'])->name('dashboard.toko.approve');
        Route::put('/toko/not-approve/{toko:slug}', [DashboardTokoController::class, 'notApprove'])->name('dashboard.toko.notApprove');
        Route::get('/transaksi', [DashboardTransaksiController::class, 'index'])->name('dashboard.transaksi');
        Route::get('/delivery', [DashboardDeliveryController::class, 'index'])->name('dashboard.delivery');
        Route::get('/product', [DashboardProductController::class, 'index'])->name('dashboard.product');
        Route::get('/kategori', [DashboardKategoriController::class, 'index'])->name('dashboard.kategori');
        Route::get('/comment', [DashboardCommentController::class, 'index'])->name('dashboard.comment');
    });
});

Route::middleware('auth')->group(function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/editProfile', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/editProfile', [UserController::class, 'update'])->name('user.update');
    
    Route::get('/alamat', [AlamatController::class, 'index'])->name('alamat');
    Route::get('/alamat/tambah', [AlamatController::class, 'create'])->name('alamat.create');
    Route::post('/alamat', [AlamatController::class, 'store'])->name('alamat.store');
    Route::get('/alamat/{alamat:id}/edit', [AlamatController::class, 'edit'])->name('alamat.edit');
    Route::put('/alamat/{alamat:id}', [AlamatController::class, 'update'])->name('alamat.update');
    Route::delete('/alamat/{alamat:id}', [AlamatController::class, 'destroy'])->name('alamat.delete');
    
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    Route::post('/keranjang/create', [KeranjangController::class, 'store'])->name('keranjang.create');
    Route::put('/keranjang/update', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::delete('/keranjang/delete', [KeranjangController::class, 'destroy'])->name('keranjang.delete');
    
    Route::get('/favorit', [FavoritController::class, 'index'])->name('favorit');
    Route::post('/favorit/create', [FavoritController::class, 'store'])->name('favorit.create');
    Route::delete('/favorit/delete', [FavoritController::class, 'destroy'])->name('favorit.delete');
    
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.create');
    Route::get('/invoice/{transaksi}', [TransaksiController::class, 'invoice'])->name('transaksi.invoice');

    Route::get('/checkout/lokasi', [TransaksiController::class, 'lokasi'])->name('checkout.lokasi');
    Route::post('/checkout/ongkir', [TransaksiController::class, 'ongkir'])->name('checkout.ongkir');
    Route::post('/checkout/bayar', [TransaksiController::class, 'checkout'])->name('checkout.bayar');
    
    Route::get('/{toko:slug}', [TokoController::class, 'show'])->name('toko.show');
    Route::get('/toko/create', [TokoController::class, 'create'])->name('toko.create');
    Route::post('/toko/create', [TokoController::class, 'store'])->name('toko.store');
});

// verification akun
// Route::get('/email/verify', [VerificationController::class, 'notice'])->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware('auth', 'signed')->name('verification.verify');
// Route::post('/email/resend-verify', [VerificationController::class, 'resend'])->middleware('auth', 'throttle:6,1')->name('verification.send');
