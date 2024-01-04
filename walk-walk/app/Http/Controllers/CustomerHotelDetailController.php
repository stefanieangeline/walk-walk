<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CustomerHotelDetailController extends Controller
{
    public function index($id){
        $inDate = request()->get("inDate");
        $outDate = request()->get("outDate");
        $room = request()->get("room");
        $nameHotel = request()->get("name");
        $starHotel = request()->get("star");
        $typeRoom = request()->get("type");
        $capacityRoom = request()->get("capacity");
        $wideRoom = request()->get("wide");
        $priceRoom = request()->get("price");
        // $nationalityUser = Auth::User()->name;
        $countries = Country::all();

        return view('customer-hotel-detail',[
            'inDate'=>$inDate,
            'outDate'=>$outDate,
            'room'=>$room,
            'nameHotel'=>$nameHotel,
            'starHotel'=>$starHotel,
            'typeRoom'=>$typeRoom,
            'capacityRoom'=>$capacityRoom,
            'wideRoom'=>$wideRoom,
            'priceRoom'=>$priceRoom,
            'countries'=>$countries
        ]);
    }
}
