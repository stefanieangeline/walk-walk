<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login () {
        return view("login");
    }

    public function authenticate () {

        $validated = request()->validate([
            "email"=> "required|email",
            "password"=> "required|confirmed"
            ]
        );

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route("home");
        }

        dump("hallo");

        // return redirect()->route("login");
    }
}
