<?php

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
Route::get('/products/{slug}', [SiteController::class, 'product'])->name('product');


require __DIR__ . '/auth.php';
require __DIR__ . '/backend.php';
