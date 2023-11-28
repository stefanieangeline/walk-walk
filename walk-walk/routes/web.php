<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CustomerHotelDetailController;
use App\Http\Controllers\EticketController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelPaymentController;
use App\Http\Controllers\HotelRoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SigninController;
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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/flights', [FlightController::class, 'index'])->name('flights');

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels');

Route::get('/hotels/detail', [HotelController::class, 'detail'])->name('hotels');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/sign-in', [SigninController::class, 'index'])->name('sign-in');

Route::get('/account', [AccountController::class,'index'])->name('account');

Route::get('/help', [HelpController::class,'index'])->name('help');

Route::get('/hotel-payment', [HotelPaymentController::class, 'index'])->name('hotel-payment');

Route::get('/eticket', [EticketController::class,'index'])->name('e-ticket');

Route::get('/hotel-room', [HotelRoomController::class, 'index'])->name('hotel-room');

Route::get('/customer-hotel-detail', [CustomerHotelDetailController::class, 'index'])->name('customer-hotel-detail');

Route::get('/payment-barcode', function(){
    return view('payment-barcode');
});

Route::get('/passanger-detail', function(){
    return view('passanger-detail');
});