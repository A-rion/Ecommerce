<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MyaccountController;
use App\Http\Controllers\ProductdetailController;
use App\Http\Controllers\WishlistController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index']);
Route::get('/home', [UserController::class, 'home']);
Route::get('/productlist', [UserController::class, 'productlist']);
Route::get('/productdetail', [UserController::class, 'productdetail']);
Route::get('/cart', [UserController::class, 'cart']);
Route::get('/checkout', [UserController::class, 'checkout']);
Route::get('/myaccount', [UserController::class, 'myaccount']);
Route::get('/wishlist', [UserController::class, 'wishlist']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/cart', [CartController::class, 'index']);
Route::get('/productlist', [ProductListController::class, 'index']);
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/myaccount', [MyaccountController::class, 'index']);
Route::get('/productdetail', [ProductdetailController::class, 'index']);
Route::get('/wishlist', [WishlistController::class, 'index']);
