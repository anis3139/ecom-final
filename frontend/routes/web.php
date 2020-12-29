<?php

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


Route::get('/', [App\Http\Controllers\client\HomeController::class, 'index'])->name('client.home');
Route::get('/product/{slug}', [App\Http\Controllers\client\productController::class, 'showProductDetails'])->name('client.showProductDetails');
Route::get('/cart', [App\Http\Controllers\client\cartController::class, 'showCart'])->name('client.showCart');
Route::post('/cart', [App\Http\Controllers\client\cartController::class, 'addToCart'])->name('client.addCart');
Route::post('/cartRemove', [App\Http\Controllers\client\cartController::class, 'RemoveFromCart'])->name('client.cartRemove');
Route::get('/cartClear', [App\Http\Controllers\client\cartController::class, 'clearCart'])->name('client.ClearCart');
Route::get('/checkout', [App\Http\Controllers\client\cartController::class, 'checkout'])->name('client.checkout');
Route::post('/processOrder', [App\Http\Controllers\client\cartController::class, 'order'])->name('client.processOrder');


Route::get('/login', [App\Http\Controllers\client\authController::class, 'showLogin'])->name('client.login');
Route::post('/onlogin', [App\Http\Controllers\client\authController::class, 'onlogin'])->name('client.onlogin');
Route::get('/logout', [App\Http\Controllers\client\authController::class, 'logout'])->name('client.logout');
Route::get('/registration', [App\Http\Controllers\client\authController::class, 'registration'])->name('client.registration');
Route::post('/addUser', [App\Http\Controllers\client\authController::class, 'addUser'])->name('client.addUser');
Route::get('/active/{token}', [App\Http\Controllers\client\authController::class, 'userActive'])->name('client.active');




Route::get('/profile', [App\Http\Controllers\client\authController::class, 'profile'])->name('client.profile');
