<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Middleware\loginAuth;
use App\Http\Middleware\roleAuth;

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
Route::post('/registerSubmit', [UserController::class, 'registerSubmit'])->name('registerSubmit');

// Admin DashBoard
Route::get('/dashboard', [adminController::class, 'adminDash'])->middleware(roleAuth::class, loginAuth::class)->name('dashboard');
Route::get('/adminregister', [adminController::class, 'adminRegister'])->name('adminRegister');
Route::get('/adminlogin', [adminController::class, 'adminLogin'])->name('adminLogin');
Route::post('/registerInput', [adminController::class, 'registerInput'])->name('registerInput');
Route::post('/loginInput', [adminController::class, 'loginInput'])->name('loginInput');
