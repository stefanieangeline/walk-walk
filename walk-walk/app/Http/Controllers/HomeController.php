<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view("home", [
            "countries" => Country::all(),
            "airports" => Airport::all(),
            "cities" => City::all()
        ]);
    }
}
