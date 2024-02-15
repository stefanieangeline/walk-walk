<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use app\Http\Controllers\Auth;
// use Illuminate\Support\Facades\Auth as FacadesAuth;

class AccountController extends Controller
{
    public function index() {
        //retrieves the authenticated user's country ID using Laravel's Auth system and returns a view with the user's country name fetched from the database. 
        $user = Auth::user()->IDCountry;
        return view("myaccount",['country'=> Country::where('IDCountry', $user)->select('NameCountry')->first()]);
    }
}
