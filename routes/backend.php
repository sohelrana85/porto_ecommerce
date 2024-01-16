<?php

use App\Http\Controllers\staff\OrderController;
use App\Http\Controllers\Staff\BrandController;
use App\Http\Controllers\Staff\CategoryController;
use App\Http\Controllers\staff\DashboardController;
use App\Http\Controllers\staff\ExtraController;
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

    Route::post('get-data', [ExtraController::class, 'getData'])->name('get-data');
    // Route::post('product/{id}', [ProductController::class, 'fetured'])->name('product');
    Route::post('get-data/featured/{id}', [ExtraController::class, 'featured'])->name('get-data.featured');
});

Route::get('staff/order/status/{id}', [OrderController::class, 'order_status_change'])->middleware('auth');
Route::get('staff/order/update/{id}', [OrderController::class, 'order_status_update'])->middleware('auth');
