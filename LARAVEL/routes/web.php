<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/detail-product/{id}', [IndexController::class, 'show'])->name('detail-product');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
});
//CART
Route::get('/add-to-cart',[CartController::class,'addToCart'])->name('carts');
Route::get('/cart/{id}',[CartController::class,'Cart'])->name('cart');
Route::get('/delete-cart', [CartController::class, 'deleteCart'])->name('deleteCarts');
Route::get('/update-cart', [CartController::class, 'updateCart'])->name('updateCart');

// Checkout
Route::get('/checkout/{id}',[CheckoutController::class,'Checkout'])->name('checkout');
//coupon
Route::get('check-coupon',[CouponController::class,'CheckCoupon'])->name('CheckCoupon');
//customer
Route::post('add-customer',[IndexController::class,'AddCustomer'])->name('AddCustomer');
Route::post('update-customer',[IndexController::class,'UpdateCustomer'])->name('UpdateCustomer');
Route::post('get-customer',[IndexController::class,'getCustomer'])->name('getCustomer');
//invoice
Route::post('add-invoice',[InvoiceController::class,'store'])->name('addInvoice');



Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

// Email Verification Routes...
Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');


Route::get('/home', [App\Http\Controllers\IndexController::class, 'index'])->name('home');
