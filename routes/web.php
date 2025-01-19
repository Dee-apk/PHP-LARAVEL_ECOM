<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// routes/web.php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Guest Routes (Unauthenticated users)
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Public Routes (Accessible by everyone)
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');

// Authenticated Routes (Only accessible by logged-in users)
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard'); // Adjust if your Blade file is in a different location.
    })->name('dashboard');

    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');


    Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    // Cart and Checkout Routes
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    // Order Routes
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
});

require __DIR__.'/auth.php';  // This is required to include routes related to authentication like registration, login, etc.
