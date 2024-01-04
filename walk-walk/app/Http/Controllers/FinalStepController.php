<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\OrderedRoom;
use Illuminate\Http\Request;

class FinalStepController extends Controller
{
    //
    public function index(){
        $description = request()->post("description");
        $inDate = request()->get("inDate");
        $outDate = request()->get("outDate");
        $room = request()->get("room");
        $nameHotel = request()->get("name");
        $starHotel = request()->get("star");
        $typeRoom = request()->get("type");
        $capacityRoom = request()->get("capacity");
        $wideRoom = request()->get("wide");
        $priceRoom = request()->get("price");
        $ordered_rooms = new OrderedRoom();
        
        $ordered_rooms->IDHotel = Hotel::query()->where(name);
        return view('final-step');
    }
}
