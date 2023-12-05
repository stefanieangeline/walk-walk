<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index() {
        $dest = request()->get("destination");
        $inDate = request()->get("inDate");
        $outDate = request()->get("outDate");
        $room = request()->get("room");
        $guest = request()->get("guest");

        if (strtotime($outDate) <= strtotime($inDate)) {
            // Jika outDate kurang dari atau sama dengan inDate, kembalikan ke halaman sebelumnya
            return redirect()->back()->withInput()->withErrors(['outDate' => 'Tanggal check-out harus setelah tanggal check-in.']);
        }

        return view("hotels",[
            'hotels' => Hotel::query()
            ->join('Cities','Cities.IDCity','=','Hotels.IDCity')
            ->join('Countries','Cities.IDCountry','=','Countries.IDCountry')
            // ->join('Hotel_facility_headers', 'Hotels.IDHotel','=','Hotel_facility_headers.IDHotel')
            // ->join('Hotel_facility_details', 'Hotel_facility_headers.IDDetailFacilityHotel','=','Hotel_facility_details.IDDetailFacilityHotel')
            // ->join('Hotel_rooms', 'Hotels.IDHotel','=','Hotel_rooms.IDHotel')
            // ->select('Hotels.NameHotel','Cities.NameCity as HotelCity','Hotels.StarHotel','Hotels.RatingHotel', 
            //         'Hotel_facility_details.NameFacility','Hotel_rooms.TypeRoom', 'Hotel_rooms.PriceRoom', 'Hotel_rooms.WideRoom')
            ->where(function ($query) use ($dest) {
                $query->where('Cities.NameCity', 'like', '%' . $dest . '%')
                ->orWhere('Countries.NameCountry', 'like', '%' . $dest . '%');
            })
            ->get(),

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
