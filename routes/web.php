<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::controller(HomeController::class)->group(
    function () {
        Route::get('/', 'Index')->name('home');
        Route::get('/about', 'About')->name('about');
        Route::get('/contact', 'Contact')->name('contact');
        Route::get('/shop', 'Shop')->name('shop');
        Route::get('/category/{id}/{slug}', 'Category')->name('category');
        Route::get('/collection/{id}/{slug}', 'Collection')->name('collection');
        Route::get('/product-details/{id}/{slug}', 'ProductDetails')->name('product');

    }
);

Route::controller(CartController::class)->group(
    function () {
                
        // Cart routes (session-based)
        Route::post('/cart/add/{id}','add')->name('cart.add');
        Route::get('/cart', 'index')->name('cart.cart');
        Route::get('/cart/remove/{id}','remove')->name('cart.remove');
    }
);
