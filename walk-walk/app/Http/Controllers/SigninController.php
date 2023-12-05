<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SigninController extends Controller
{
    public function index () {
        
        return view("signin");
    }

    public function store ()  {
        $validated = request();



        return redirect()->route("login")->with("success","");
    }
}
