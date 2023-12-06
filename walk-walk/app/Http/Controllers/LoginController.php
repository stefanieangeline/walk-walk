<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login () {
        return view("login");
    }

    public function authenticate (Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);
        // dd($validated);

        $input = $request->all();
        // dd($request->all());
        $input['password'] = bcrypt($input['password']);
        $user = User::where('email', $input['email'])->first();
        if (Auth::attempt($validated)) {
            request()->session()->regenerate();
            Session::put('User_logged',$user);
            Session::save();
            return redirect()->route("home");
        }

        return redirect()->route("login");
    }
}
