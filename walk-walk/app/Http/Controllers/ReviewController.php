<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\HotelRooms;
use App\Models\OrderedRoom;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    //
    public function index(){
        $IDOrder = request()->get('order');
        $order = OrderedRoom::where("IDOrder",$IDOrder)->first();
        $hotel = Hotel::where("IDHotel",$order->IDHotel)->first();
        $hotelroom = HotelRooms::where("IDHotel",$order->IDHotel)->where("TypeRoom",$order->TypeRoom)->first();
        $reviewCount = Review::select( DB::raw("COUNT(hotels.IDHotel) as count"))->join('hotels','hotels.IDHotel', "=","reviews.IDHotel")->first();
        $reviewCount = $reviewCount->count;
        $city = City::where("IDCity",$hotel->IDCity)->first();
        $country = Country::where("IDCountry",$city->IDCountry)->first();
    


        // dd($reviewCount);
        return view('hotel-cust-review',[
            "order" => $order,
            'hotel' => $hotel,
            'hotelroom' => $hotelroom,
            'reviewcount' => $reviewCount,
            'city'=>$city,
            'country'=>$country
        ]);
    }

}
