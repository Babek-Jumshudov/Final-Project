<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;


// --------------menu-------------------------------------
Route::group(['prefix' => '/'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/home', [ProductController::class, 'index'])->name('home');
    Route::get('/explore', [ProductController::class, 'explore'])->name('explore');
    Route::get('/favorites', [ProductController::class, 'favorites'])->name('favorites');
    Route::get('/orders', [ProductController::class, 'orders'])->name('orders');
    Route::get('/setting', [ProductController::class, 'setting'])->name('setting');
 });
// --------------login-register---------------------------
Route::prefix('/login')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store'])->name("login");

});
Route::prefix('/register')->group(function () {
    Route::get('/', function () {
        return view('login-register.register');
    });
    Route::post('/', [UserController::class, 'Register'])->name("register");

});
Route::prefix("/forgot")->group(function () {
    Route::get('/', function () {
        return view('login-register.forgot');
    })->name('forgot');

    Route::post('password/reset', [UserController::class, 'resetPassword'])->name('password.reset');
});
Route::group(['prefix' => '/email'], function () {
    Route::get('connaction', [UserController::class, 'TestController'])->name('email.connaction');
    Route::get('send', [MailController::class, 'index'])->name('send.email');

});
// --------------Admin Panel-----------------------------
Route::group(['prefix' => '/adminPanel'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.user');
    Route::delete('users/{user}', [AdminController::class, 'destroy'])->name('admin.delete');
});
Route::group(['prefix' => 'adminPanel/menu'], function () {
    Route::get('/', [ProductController::class, 'view'])->name('menu');
    Route::post('/add', [ProductController::class, 'create'])->name('product.creat');
    Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.delete');

});
Route::group(['prefix' => 'adminPanel/resturant'], function () {
    Route::get('/', [SellerController::class, 'index'])->name('restaurant');
    Route::post('/add', [SellerController::class, 'create'])->name('seller.creat');
    Route::delete('seller/{seller}', [SellerController::class, 'destroy'])->name('seller.delete');

});


