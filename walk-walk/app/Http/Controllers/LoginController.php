<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login () {
        return view("login");
    }

    public function authenticate () {

        $validated = request()->validate([
            "email"=> "required|email",
            "password"=> "required"
            ]
        );

        if (Auth::attempt(['email' => $validated["email"], 'password' => $validated["password"]], $remember)) {
            request()->session()->regenerate();
            return redirect()->route("home");
        }

        return redirect()->route("login");
    }
}
