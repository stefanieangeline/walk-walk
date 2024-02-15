<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Carbon\Carbon;
use App\Models\OrderedRoom;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerHotelDetailController extends Controller
{
    public function index($id){
        //set variable
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
        $countries = Country::all();

        //return page and its variable
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

    //retrieves the 'price' and 'id' parameters from the request and returns a view named 'final-step' and its variable.
    public function payment(){
        $price = request()->get('price');
        $id = request()->get('id');

        return view('final-step', [
            "price" => $price,
            "id" => $id
        ]);    
    }

    //handles the creation of a new order for a hotel room reservation. It retrieves parameters and then inserts the order details into the database using the OrderedRoom model. 
    public function paymentCreate() {
        $IDHotel = request()->get('idHotel');
        $TypeRoom = request()->get('typeRoom');
        $RoomCount = request()->get('roomCount');

        $id = Auth::user()->id;
        $Description = request()->get('description');
        if($Description == null){
            $Description = '-';
        }

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
        $order->RoomCount = $RoomCount;
        $order->save();
        $price = request()->get('PriceRoom');

        //return redirect to the 'final-step' route, passing the calculated 'price' and the order's 'id' as parameters to the view.
        return redirect()->route("final-step", [
            "price" => $price,
            "id" => $order->id
        ]);
    }

    //processes a successful hotel room reservation, calculates stay duration, updates order status, and displays relevant details in the "hotel-payment" view
    public function success(){
        $IDOrder = request()->get('id');
        $price = request()->get('price');
        $checkIn = Carbon::parse(OrderedRoom::where("IDOrder", $IDOrder)->first()->CheckInDate);
        $checkOut = Carbon::parse(OrderedRoom::where("IDOrder", $IDOrder)->first()->CheckOutDate);
        $duration = $checkOut->diffInDays($checkIn);

        OrderedRoom::where("IDOrder", $IDOrder)->update(array("status"=>1));
        $dateAndTime = OrderedRoom::where("IDOrder", $IDOrder)->first()->created_at;
        $hotelName = OrderedRoom::where("IDOrder", $IDOrder)
                    ->join('hotels', 'ordered_rooms.IDHotel', '=', 'hotels.IDHotel')
                    ->value('hotels.NameHotel');

        $rooms = OrderedRoom::where("IDOrder", $IDOrder)->first()->RoomCount;
        return view("hotel-payment", ["IDOrder" => $IDOrder, "price" => $price, "duration" => $duration, "dateAndTime" => $dateAndTime, "hotelName" => $hotelName, "rooms" => $rooms]);
    }
}
