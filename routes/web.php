<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Contracts\Session\Session;

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

Route::get('/index', function () {
    return view('login');
});

Route::view('/register','register')->name('user_register_view');
Route::POST("/registerUser", [UserController::class,'register'])->name('user_register');
Route::get("/logout", [UserController::class,'logout'])->name('logout.user');
Route::POST("/login", [UserController::class,'login'])->name('login.user');
Route::get("/", [ProductController::class,'index']);
Route::get("detail/{id}", [ProductController::class,'detail'])->name('product.detail');
Route::get("search", [ProductController::class,'search'])->name('product.search');
Route::post("add_to_cart", [ProductController::class,'add_to_cart'])->name('product.cart');
Route::get("cartlist", [ProductController::class,'cartlist'])->name('cart.list');
Route::get("removecart/{id}", [ProductController::class,'removeCart'])->name('cart.remove');
Route::get("ordernow", [ProductController::class,'orderNow'])->name('products.ordernow');
Route::post("orderplace", [ProductController::class,'orderPlace'])->name('order.place');
Route::get("myOrders", [ProductController::class,'myOrder'])->name('all_orders');

