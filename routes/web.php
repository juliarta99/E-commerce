<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('welcome',
[
    'title' => 'Home'
]);
});
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [LoginController::class, 'create'])->middleware('guest');
Route::post('/register', [LoginController::class, 'store'])->middleware('guest');
