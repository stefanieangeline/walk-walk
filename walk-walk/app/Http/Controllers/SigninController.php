<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\User;

class SigninController extends Controller
{
    public function index () {

        return view("signin", [
            "countries" => Country::all()
        ]);
    }

    public function store ()  {
        $validated = request()->validate([
            'name' => 'required|alpha',
            'phoneNumber' =>['required', 'numeric'],
            'email' => ['required', 'unique:users,email', 'email', 'regex:/@gmail\.com$/i'],
            'password' => 'required|min:8',
            // 'email' => ['required', 'unique:users,email'],
            // 'password' => ['required'],
            'nationality' => ['required']

        ], [
            'email.regex' => 'Email must end with @gmail.com',
            'password.min' => 'Password must be at least 8 characters',
            'phoneNumber.numeric' => 'Phone number should only contain digits',
            'name.alpha' => 'Full name should only contain alphabetic characters',
        ]);
        
        $todayDate = date("Y-m-d");
        $newUser = new User();
        // $newUser =
        $newUser->DOBUser = $todayDate;
        $newUser->NationalityUser = 1;
        $newUser->name = $validated['name'];
        $newUser->email = $validated['email'];
        $newUser->password = bcrypt($validated['password']);
        $newUser->NoTelpUser = $validated['phoneNumber'];
        $newUser->NationalityUser = Country::where('NameCountry',$validated['nationality'])->first()->IDCountry;

        // dd($newUser);
        $newUser->save();




        return redirect()->route("login")->with("success","");
    }
}
