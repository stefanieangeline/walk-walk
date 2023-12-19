<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelRooms;
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

        $roomTypes = HotelRooms::where('IDHotel', $id)->get();

        return view('hotel-room', [
            'dest'=> $destination,
            'inDate'=>$inDate,
            'outDate'=>$outDate,
            'room'=>$room,
            'guest'=>$guest,
            'hotel'=>$hotel,
            'roomTypes' => $roomTypes
            // "hotel" => Hotel::query()->where('IDHotel', $id)->first()
        ]);
    }
}
