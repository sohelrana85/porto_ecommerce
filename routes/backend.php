<?php

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
});
Route::post('staff.product', [ProductController::class, 'getData'])->name('staff.product');
