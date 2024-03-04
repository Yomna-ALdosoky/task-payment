<?php

use App\Http\Controllers\Payment;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PayPalPaymentController; 
use App\Http\Controllers\PayPalPaymentController;
use App\Http\Controllers\ProductController;

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



// PayPalPaymentController
Route::get('go-payment', [PayPalPaymentController::class, 'goPayment'])->name('payment.go');

Route::post('payment',[PayPalPaymentController::class, 'payment'])->name('payment');
Route::get('cancel',[PayPalPaymentController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalPaymentController::class, 'success'])->name('payment.success');

// productcontroller
Route::get('all-transaction', [PayPalPaymentController::class, 'show']);

Route::get('product_search', [PayPalPaymentController::class, 'product_search']);