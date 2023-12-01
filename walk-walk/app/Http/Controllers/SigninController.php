<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SigninController extends Controller
{
    public function index () {
        $user = new User();
        $user->name = "stef";
        $user->email = "stef@email";
        $user->password = bcrypt("email");
        $user->NoTelpUser = "123";
        $user->DOBUser = "2000-01-01";
        $user->NationalityUser = 1;
        $user->save();

        $user = new User();
        $user->name = "marlen";
        $user->email = "marlen@email";
        $user->password = bcrypt("email");
        $user->NoTelpUser = "123";
        $user->DOBUser = "2000-01-01";
        $user->NationalityUser = 1;
        $user->save();

        $user = new User();
        $user->name = "hans";
        $user->email = "hans@email";
        $user->password = bcrypt("email");
        $user->NoTelpUser = "123";
        $user->DOBUser = "2000-01-01";
        $user->NationalityUser = 1;
        $user->save();
        return view("signin");
    }

    public function store ()  {
        $validated = request();



        return redirect()->route("login")->with("success","");
    }
}
