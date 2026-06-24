<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/shop', [ShopController::class, 'index'])
    ->name('shop');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

Route::get('/new-arrivals', [ProductController::class, 'newArrivals'])
    ->name('new-arrivals');

Route::get('/top-selling', [ProductController::class, 'topSelling'])
    ->name('top-selling');

Route::get('/product/{id}', [ProductController::class, 'show'])
    ->name('product.show');

/*
|--------------------------------------------------------------------------
| Cart & User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

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

    Route::view('/profile', 'profile')
        ->name('profile');
    
    Route::post('/payment', [CartController::class, 'payment'])
        ->middleware('auth')
        ->name('payment');
        
    Route::get('/my-orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/my-orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');
});

/*
|--------------------------------------------------------------------------
| Breeze Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';