<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelFacilityDetail;
use App\Models\HotelFacilityHeader;
use App\Models\HotelRooms;
use App\Models\Review;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    public function index($id){
        $destination = request()->get('destination');
        $inDate = request()->get("inDate");
        $outDate = request()->get("outDate");
        $room = request()->get("room");
        $guest = request()->get("guest");

        $hotel = Hotel::query()->where('IDHotel', $id)->first();
        // $roomTypes = HotelRooms::where('IDHotel', $id)->get();
        $roomTypes = HotelRooms::with('facilities')->where('IDHotel', $id)->where('QuantityRoom', '>=', $room)->get();
        $totalRoomTypes = $roomTypes->count();

        $reviews = Review::query()
        ->join('Users', 'Users.id', '=', 'reviews.id')
        ->where('reviews.IDHotel', '=', $id)
        ->get();

        $reviewsCount = Review::query()
        ->join('Users', 'Users.id', '=', 'reviews.id')
        ->where('reviews.IDHotel', '=', $id)
        ->count();

        $hotelFacilities = HotelFacilityHeader::query()
        ->join('hotel_facility_details', 'Hotel_Facility_Headers.IDDetailFacilityHotel', '=', 'Hotel_Facility_Details.IDDetailFacilityHotel')
        ->where('Hotel_Facility_Headers.IDHotel', '=', $id)
        ->get();

        return view('hotel-room', [
            'dest'=> $destination,
            'inDate'=>$inDate,
            'outDate'=>$outDate,
            'room'=>$room,
            'guest'=>$guest,
            'hotel'=>$hotel,
            'roomTypes' => $roomTypes,
            'totalRoomTypes' => $totalRoomTypes,
            'reviews' => $reviews,
            'reviewsCount' => $reviewsCount,
            'hotelFacilities'=>$hotelFacilities
            // "hotel" => Hotel::query()->where('IDHotel', $id)->first()
        ]);
    }
}
