<?php

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Cart\CustomerController;
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
Route::post('/product/{slug?}', [SiteController::class, 'loadmore'])->name('loadmore');
Route::get('/product/{slug}', [SiteController::class, 'product'])->name('product');
Route::post('/products/quickview/{slug}', [SiteController::class, 'productquickview'])->name('product.quickview');


// cart
Route::get('/cart/show', [CartController::class, 'index'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
Route::post('/cart/add/icon', [CartController::class, 'store_from_icon'])->name('store.from.icon');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.remove');
Route::get('/cart/remove-all', [CartController::class, 'removeall'])->name('cart.remove-all');
Route::post('/cart/load-cart-item', [CartController::class, 'load_cart_item']);

//customer

Route::prefix('auth')->name('customer.')->group(function () {
    Route::get('/login', [CustomerController::class, 'login_form'])->name('login');
    Route::post('/login', [CustomerController::class, 'login'])->name('login');
    Route::get('/register', [CustomerController::class, 'register_form'])->name('register');
    Route::post('/register', [CustomerController::class, 'register'])->name('register');
    Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
    Route::get('/myaccount', [CustomerController::class, 'myaccount'])->name('myaccount');
});



require __DIR__ . '/auth.php';
require __DIR__ . '/backend.php';
