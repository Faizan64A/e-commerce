<?php

use App\Http\Controllers\AuthPageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/category/{slug}', [ProductController::class, 'category'])->name('products.category');
Route::get('/product/{id}', [ProductController::class, 'show'])->whereNumber('id')->name('products.show');

Route::get('/cart', [StoreController::class, 'cart'])->name('cart');
Route::get('/checkout', [StoreController::class, 'checkout'])->name('checkout');
Route::get('/favorites', [StoreController::class, 'favorites'])->name('favorites');
Route::get('/profile', [StoreController::class, 'profile'])->name('profile');

Route::get('/login', [AuthPageController::class, 'login'])->name('login');
Route::get('/signup', [AuthPageController::class, 'register'])->name('register');
Route::get('/forgot-password', [AuthPageController::class, 'forgotPassword'])->name('password.request');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/size-guide', [PageController::class, 'sizeGuide'])->name('size-guide');
Route::get('/shipping', [PageController::class, 'shipping'])->name('shipping');
Route::get('/returns', [PageController::class, 'returns'])->name('returns');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/cookies', [PageController::class, 'cookies'])->name('cookies');
