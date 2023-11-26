<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index() {
        return view("hotels");
    }

    public function detail() {
        return view("hotel-room");
    }
}
