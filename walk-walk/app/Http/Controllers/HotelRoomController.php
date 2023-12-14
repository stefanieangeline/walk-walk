<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    public function index($id){
        return view('hotel-room', [
            "hotel" => Hotel::query()->where('IDHotel', $id)->first()
        ]);
    }
}
