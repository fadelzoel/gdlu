<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

// Wajib dipanggil agar route login/logout aktif
require __DIR__.'/auth.php';

// Route Public
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route Admin (Hanya bisa diakses jika sudah login)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
});