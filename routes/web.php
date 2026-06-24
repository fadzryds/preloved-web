<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::view('/shop', 'shop')->name('shop');

Route::view('/categories', 'categories')->name('categories');

Route::view('/new-arrivals', 'new-arrivals')->name('new-arrivals');

Route::view('/top-selling', 'top-selling')->name('top-selling');

Route::view('/cart', 'cart')->name('cart');

Route::view('/checkout', 'checkout')->name('checkout');

Route::view('/profile', 'profile')->name('profile');

Route::get('/product/{id}', [ProductController::class, 'show'])
    ->name('product.show');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart');

Route::post('/cart/add/{product}', [CartController::class, 'add'])
    ->name('cart.add');

Route::post('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::post('/cart/increase/{id}', [CartController::class, 'increase'])
    ->name('cart.increase');

Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])
    ->name('cart.decrease');

Route::post('/cart/clear', [CartController::class, 'clear'])
    ->name('cart.clear');

Route::post('/buy-now/{product}', [CartController::class, 'buyNow'])
    ->name('buy.now');
    
Route::get('/checkout', [CartController::class, 'checkout'])
    ->name('checkout');
    
Route::get('/checkout', [CartController::class, 'checkout'])
    ->name('checkout');