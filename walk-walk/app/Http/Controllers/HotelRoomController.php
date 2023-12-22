<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
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
        $roomTypes = HotelRooms::with('facilities')->where('IDHotel', $id)->get();
        $totalRoomTypes = $roomTypes->count();

        $reviews = Review::query()
        ->join('Users', 'Users.id', '=', 'reviews.id')
        ->where('reviews.IDHotel', '=', $id)
        ->get();

        $reviewsCount = Review::query()
        ->join('Users', 'Users.id', '=', 'reviews.id')
        ->where('reviews.IDHotel', '=', $id)
        ->count();

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
            'reviewsCount' => $reviewsCount
            // "hotel" => Hotel::query()->where('IDHotel', $id)->first()
        ]);
    }
}
