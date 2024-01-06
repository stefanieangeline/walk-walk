<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\OrderedRoom;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $IDHotel = request()->get('idHotel');
        // $nationalityUser = Auth::User()->name;
        $countries = Country::all();

        return view('customer-hotel-detail',[
            'idHotel'=>$IDHotel,
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
    public function payment(){
        $price = request()->get('price');
        $id = request()->get('id');

        return view('final-step', [
            "price" => $price,
            "id" => $id
        ]);

    }

    public function paymentCreate() {
        $IDHotel = request()->get('idHotel');
        // dd($IDHotel);
        $TypeRoom = request()->get('typeRoom');
        
        $id = Auth::user()->id;
        $Description = request()->get('description');
        if($Description == null){
            $Description = '-';
        }
        // dd($Description);  
        $CheckInDate = request()->get('inDate');
        $CheckOutDate = request()->get('outDate');
        $Status = 0;

        $order = new OrderedRoom();
        $order->IDHotel = $IDHotel;
        $order->TypeRoom = $TypeRoom;
        $order->id = $id;
        $order->Description = $Description;
        $order->CheckInDate = $CheckInDate;
        $order->CheckOutDate = $CheckOutDate;
        $order->Status = $Status;
        $order->save();
        $price = request()->get('PriceRoom');
        // dd($order->id);

        return redirect()->route("final-step", [
            "price" => $price,
            "id" => $order->id
        ]);
    }
    public function success(){
        $IDOrder = request()->get('id');
        $price = request()->get('price');

        // dd($IDOrder);
        OrderedRoom::where("IDOrder", $IDOrder)->update(array("status"=>1));
        // $price = OrderedRoom::where("IDOrder", $IDOrder)->first()->created_at;
        $dateAndTime = OrderedRoom::where("IDOrder", $IDOrder)->first()->created_at;
        $hotelName = OrderedRoom::where("IDOrder", $IDOrder)
                    ->join('hotels', 'ordered_rooms.IDHotel', '=', 'hotels.IDHotel')
                    ->select('hotels.name')
                    ->first();
        


        return view("home-payment", ["IDOrder" => $IDOrder]);
    }
}
