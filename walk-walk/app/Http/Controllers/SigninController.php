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
            'name' =>['required'],
            'phoneNumber' =>['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required'],
            'nationality' => ['required']

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
