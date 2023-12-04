<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index() {
        $dest = request()->get("destination");
        $inDate = request()->get("inDate");
        $outDate = request()->get("outDate");
        $room = request()->get("room");
        $guest = request()->get("guest");
        
        return view("hotels",[
            'dest'=> $dest,
            'inDate'=>$inDate,
            'outDate'=>$outDate,
            'room'=>$room,
            'guest'=>$guest
        ]);
    }

    // public function detail() {
    //     return view("hotel-room");
    // }
}
