<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('layouts.home');
});

route::get('/register', [AuthController::class, 'register'])->name('register');
route::post('/register', [AuthController::class, 'registerPost'])->name('register1');
route::get('/login', [AuthController::class, 'login'])->name('login');
route::post('/login', [AuthController::class, 'loginPost'])->name('login1');
route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('products', ProductController::class);
Route::get('/search', [AuthController::class, 'search'])->name('search');
Route::get('/cetak', [AuthController::class, 'cetak']);