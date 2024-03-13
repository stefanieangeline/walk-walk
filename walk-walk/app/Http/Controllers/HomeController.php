<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function index()
    {
    // Get the count of reviews
    $reviewCount = Review::count();

    // Fetch other data using your existing logic
    $countries = Country::all();
    $airports = Airport::all();
    $cities = City::all();
    $hotels = Hotel::all();

    // Pass data to the view
    return view('home', compact('reviewCount', 'countries', 'airports', 'cities', 'hotels'));
    }

    //fetches and displays recommended hotels based on a weighted scoring algorithm considering star rating, price, and user rating.
    public function getRecommendedHotels(){
        $recommendedHotels = DB::table('hotels')
        ->join('hotel_rooms', 'hotels.IDHotel', '=', 'hotel_rooms.IDHotel')
        ->select('hotels.*', 'hotel_rooms.PriceRoom')
        ->orderByRaw('(5 - StarHotel) * 0.7 + (min(hotel_rooms.PriceRoom) over() - hotel_rooms.PriceRoom) * 0.3 + (RatingHotel - 1) / 5 - 1 * 0.2 DESC')
        ->take(10)
        ->get();

        return $recommendedHotels;
    }
}
