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

    //logs out the authenticated user, invalidates the current session, regenerates the session, and redirects the user to the "home" route.
    public function logout () {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect()->route("home");
    }

    //attempts to authenticate a user based on provided email and password, regenerates the session, stores user information in a session variable upon success, and redirects to the home page; otherwise, it redirects to the login page with an error message.
    public function authenticate (Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::where('email', $input['email'])->first();
        if (Auth::attempt($validated)) {
            request()->session()->regenerate();
            Session::put('User_logged',$user);
            Session::save();
            return redirect()->route("home");
        }

        return redirect()->route("login")->with('loginError', 'Invalid email or password ! Please Try Again');
    }
}
