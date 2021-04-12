<?php

use App\Http\Controllers\staff\OrderController;
use App\Http\Controllers\Staff\BrandController;
use App\Http\Controllers\Staff\CategoryController;
use App\Http\Controllers\staff\DashboardController;
use App\Http\Controllers\Staff\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('staff')->name('staff.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    #Brand Route
    #Route::get('/brands', [BrandController::class, 'index'])->name('brands');
    Route::resource('brand', BrandController::class);

    #category route
    Route::resource('category', CategoryController::class);

    #Product route
    Route::resource('product', ProductController::class);

    #orders route
    Route::resource('order', OrderController::class);

    Route::post('product', [ProductController::class, 'getData'])->name('product');
    Route::post('product/{id}', [ProductController::class, 'fetured'])->name('product');
    Route::post('product/featured/{id}', [ProductController::class, 'featured'])->name('product.featured');
});
