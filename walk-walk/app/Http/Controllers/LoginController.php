<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login () {
        return view("login");
    }

    public function authenticate () {
        request()->session()->regenerate();

        $validated = request()->validate([
            "email"=> "required|email",
            "password"=> "required"
            ]
        );

        if (auth()->attempt($validated)) {
            return redirect()->route("home");
        }

        return redirect()->route("login");
    }
}
