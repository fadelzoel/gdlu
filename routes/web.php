<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// ---------- Public store (catalog comes from the database) ----------
Route::get('/', [ShopController::class, 'home'])->name('shop.home');
Route::get('/shop', [ShopController::class, 'catalog'])->name('shop.catalog');
Route::get('/shop/{product}', [ShopController::class, 'show'])->name('shop.show');

// ---------- Admin dashboard ----------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class)->except('show');
    Route::get('sales', [SaleController::class, 'index'])->name('sales.index');
    Route::resource('users', UserController::class)->except('show');
});
