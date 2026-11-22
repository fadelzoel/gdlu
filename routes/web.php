<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// ---------- Public store (products come from the database) ----------
Route::get('/', [ShopController::class, 'home'])->name('shop.home');
Route::redirect('/shop', '/#products');

// ---------- Admin dashboard ----------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class)->except('show');
    Route::get('sales', [SaleController::class, 'index'])->name('sales.index');
    Route::resource('users', UserController::class)->except('show');
});
