<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/home', [UserController::class, 'home']);
Route::get('/productlist', [UserController::class, 'productlist']);
Route::get('/productdetail', [UserController::class, 'productdetail']);
Route::get('/cart', [UserController::class, 'cart']);
Route::get('/checkout', [UserController::class, 'checkout']);
Route::get('/myaccount', [UserController::class, 'myaccount']);
Route::get('/wishlist', [UserController::class, 'wishlist']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/contact', [UserController::class, 'contact']);
Route::get('/register', [UserController::class, 'register']);
