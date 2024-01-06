<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use app\Http\Controllers\Auth;
// use Illuminate\Support\Facades\Auth as FacadesAuth;

class AccountController extends Controller
{
    public function index() {
        $user = Auth::user()->IDCountry;
        return view("myaccount",['country'=> Country::where('IDCountry', $user)->select('NameCountry')->first()]);
    }
}
