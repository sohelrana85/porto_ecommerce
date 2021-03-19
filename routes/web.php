<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/products/{slug1}/{slug2}/{slug3?}', [SiteController::class, 'products'])->name('products');
Route::post('/product', [SiteController::class, 'loadmore'])->name('loadmore');
Route::post('/product/{slug}', [SiteController::class, 'product'])->name('product');
Route::post('/products/quickview/{slug}', [SiteController::class, 'productQuickview'])->name('product.quickview');


// cart
Route::get('/cart/show', [CartController::class, 'index'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.remove');
Route::get('/cart/remove-all', [CartController::class, 'removeall'])->name('cart.remove-all');








require __DIR__ . '/auth.php';
require __DIR__ . '/backend.php';
