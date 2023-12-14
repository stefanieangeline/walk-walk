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
use App\Http\Controllers\UserController;
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

Route::get('/flights/{id}', [FlightController::class, 'passenger'])->name('passenger');

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels');

Route::get('/hotels/{id}', [HotelRoomController::class, 'index'])->name('hotel-room');

// Route::get('/hotels/detail', [HotelController::class, 'detail'])->name('hotelsDetail');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware("auth");

Route::get('/sign-in', [SigninController::class, 'index'])->name('sign-in');
Route::post('/sign-in', [SigninController::class, 'store']);

Route::get('/account', [UserController::class,'index'])->name('account')->middleware("auth");

Route::get('/help', [HelpController::class,'index'])->name('help');

Route::get('/hotel-payment', [HotelPaymentController::class, 'index'])->name('hotel-payment');

Route::get('/eticket', [EticketController::class,'index'])->name('e-ticket');

Route::get('/customer-hotel-detail', [CustomerHotelDetailController::class, 'index'])->name('customer-hotel-detail');

Route::get('/payment-barcode', function(){
    return view('payment-barcode');
});

Route::get('/privacy-policy', function(){
    return view('privacy-policy');
});

Route::get('/about-us', function(){
    return view('about-us');
});

Route::get('/FAQ', function(){
    return view('FAQ');
});

Route::get('/about-group', function(){
    return view('about-group');
});

Route::get('/nav-bar', function(){
    return view('shared.nav-bar-before');
});

Route::get('/nav-barB', function(){
    return view('shared.nav-bar-home-before');
});

//sementara
Route::get('/flight-payment', function(){
    return view('flight-payment');
});

Route::get('/history', function(){
    return view('history');
});

Route::get('/booking-detail', function(){
    return view('booking-detail');
});

Route::get('/dummy', [UserController::class, 'dummy'])->name('dummy');
