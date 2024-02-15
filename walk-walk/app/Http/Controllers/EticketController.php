<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EticketController extends Controller
{
    public function index(){
        return view('e-ticket-page');
    }
}
