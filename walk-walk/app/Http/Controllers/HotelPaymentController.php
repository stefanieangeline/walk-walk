<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelPaymentController extends Controller
{
    public function index() {
        return view("hotel-payment");
    }
}