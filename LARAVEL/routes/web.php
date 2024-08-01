<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MoMoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\VNPayController;
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

 Route::middleware('checkRoles')->prefix('admin')->group(function () { //
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('coupon', CouponController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
    Route::resource('sale', SaleController::class);
    Route::resource('variant', VariantController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('order', InvoiceController::class);
});
//CART
Route::get('/print-order/',[InvoiceController::class,'print'])->name('print');
Route::get('/add-to-cart',[CartController::class,'addToCart'])->name('carts');
Route::get('/cart/{id}',[CartController::class,'Cart'])->name('cart');
Route::get('/delete-cart', [CartController::class, 'deleteCart'])->name('deleteCarts');
Route::get('/update-cart', [CartController::class, 'updateCart'])->name('updateCart');
Route::get('/update-quantity-cart', [CartController::class, 'quantityCart'])->name('quantityCart');
Route::get('/get-cart', [CartController::class, 'getCart'])->name('getCart');
Route::get('/check-cart', [CartController::class, 'checkCart'])->name('checkCart');
Route::get('/check-cart-2', [CartController::class, 'checkCartDetail'])->name('checkCartDetail');

// Checkout
Route::get('/checkout/{id}',[CheckoutController::class,'Checkout'])->name('checkout');
//coupon
Route::get('check-coupon',[CouponController::class,'CheckCoupon'])->name('CheckCoupon');
//customer
// Route::post('add-customer',[IndexController::class,'AddCustomer'])->name('AddCustomer');
Route::post('customer',[IndexController::class,'AddCustomer'])->name('Customers');
Route::post('update-customer',[IndexController::class,'UpdateCustomer'])->name('UpdateCustomer');
Route::post('get-customer',[IndexController::class,'getCustomer'])->name('getCustomer');
//invoice
Route::post('add-invoice',[InvoiceController::class,'store'])->name('addInvoice');
Route::match(['get', 'post'], 'checkout-fatal/{id}', [MoMoController::class, 'handleReturn']);
Route::match(['get', 'post'], 'checkout-fatal-vnpay/{id}', [VNPayController::class, 'handleReturn']);
//product
Route::get('/shop-product',[IndexController::class,'ProductAll'])->name('productall');
Route::post('/search-product',[IndexController::class,'seachFullText'])->name('search-product');
//thank
Route::get('/thankyou',function(){
return view('client.thank');
})->name('thank');

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
//Momo
Route::post('/update-status-order',[InvoiceController::class,'update'])->name('statusOrder');
