<?php

use App\Http\Controllers\ProductionsController;
use App\Http\Controllers\InformationMovieController;
use App\Http\Controllers\InformationSerieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SuccessTransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductionsController::class, 'index']);
Route::get('register', [RegisterController::class, 'show'])->name('register.form');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function(){
    Route::get('detalles_peli/{id}', [InformationMovieController::class, 'show'])->name('movie.details');
    Route::get('detalles_serie/{id}', [InformationSerieController::class, 'show'])->name('serie.details');
    Route::get('usuario', [UserController::class, 'show']);
    Route::get('/cart', [CartController::class, 'show'])->name('cart');
    Route::post('/cart/add/{id}/{type}/{transactionType}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('cart/payment', [CartController::class, 'proceedPayment'])->name('cart.proceedPayment');
    Route::get('/successTransaction', [SuccessTransactionController::class, 'show']);
})->middleware('auth');