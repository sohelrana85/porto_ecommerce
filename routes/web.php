<?php

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Cart\CustomerController;
use App\Http\Controllers\PagesController;
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
#search product
Route::get('/products/search', [SiteController::class, 'product_search'])->name('product.search');


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
});

Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/myaccount', [CustomerController::class, 'myaccount'])->name('myaccount')->middleware('checkcustomer');
    Route::post('/addtolist', [CustomerController::class, 'addtolist'])->name('addtolist');
    Route::get('/wishlist', [CustomerController::class, 'wishlist'])->name('wishlist')->middleware('checkcustomer');
    Route::post('/add_wishlist_to_cart', [CustomerController::class, 'add_wishlist_to_cart'])->name('add_wishlist_to_cart');
    Route::post('/clearwishlist', [CustomerController::class, 'clearwishlist'])->name('clearwishlist');
    Route::post('/load_wishlist_item', [CustomerController::class, 'load_wishlist_item'])->name('load_wishlist_item');
    Route::get('/checkout', [CustomerController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/shipping', [CustomerController::class, 'shipping'])->name('shipping');
    Route::get('/checkout/review-payment', [CustomerController::class, 'review_payment'])->name('review.payment')->middleware('checkcustomer');
    Route::post('/checkout/review-payment', [CustomerController::class, 'store_review_payment'])->name('store.review.payment');

    # billing address set
    Route::get('/address', [CustomerController::class, 'address_form'])->name('address')->middleware('checkcustomer');
    Route::post('/address', [CustomerController::class, 'save_address'])->name('address');
    Route::post('/default-address', [CustomerController::class, 'default_address'])->name('default.address');
    #load division, district and thana for jquery
    Route::post('/data', [CustomerController::class, 'data'])->name('data');

    Route::get('/addressbook', [CustomerController::class, 'address_book'])->name('addressbook')->middleware('checkcustomer');
    Route::get('/myorder', [CustomerController::class, 'myorder'])->name('myorder')->middleware('checkcustomer');
});

Route::prefix('pages')->group(function () {
    Route::get('/about', [PagesController::class, 'about'])->name('about');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/backend.php';
