<?php

use Illuminate\Support\Facades\Route;

Route::get('/menu', function () {
    return view('customer.menu');
})->name('menu');

Route::get('/cart', function () {
    return view('customer.cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('customer.checkout');
})->name('checkout');
