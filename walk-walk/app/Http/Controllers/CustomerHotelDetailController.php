<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerHotelDetailController extends Controller
{
    public function index(){
        return view('customer-hotel-detail');
    }
}
