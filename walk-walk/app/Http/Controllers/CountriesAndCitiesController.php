<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;

class CountriesAndCitiesController extends Controller
{
    public function index()
    {
        // Fetch countries and cities separately
        $countries = Country::all();
        $cities = City::all();

        // Group cities by country manually
        $groupedCities = [];
        foreach ($cities as $city) {
            $groupedCities[$city->IDCountry][] = $city;  // Assuming a 'country_id' column in your cities table
        }

        // Pass the grouped data to the view
        return view('countries-and-cities', compact('countries', 'groupedCities'));
    }
}