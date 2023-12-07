<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function index() {
        $dest = request()->get("destination");
        $inDate = request()->get("inDate");
        $outDate = request()->get("outDate");
        $room = request()->get("room");
        $guest = request()->get("guest");
        $range = request()->get("range");

        if (strtotime($outDate) <= strtotime($inDate)) {
            // Jika outDate kurang dari atau sama dengan inDate, kembalikan ke halaman sebelumnya
            // return redirect()->back()->withInput()->withErrors(['outDate' => 'Tanggal check-out harus setelah tanggal check-in.']);
        }

        return view("hotels",[
            'hotels' => Hotel::query()
            ->join('Cities','Cities.IDCity','=','Hotels.IDCity')
            ->join('Countries','Cities.IDCountry','=','Countries.IDCountry')
            ->join('Hotel_rooms', 'Hotels.IDHotel','=','Hotel_rooms.IDHotel')
            ->where(function ($query) use ($dest) {
                $query->where('Cities.NameCity', 'like', '%' . $dest . '%')
                ->orWhere('Hotels.NameHotel', 'like', '%'. $dest . '%')
                ->orWhere('Countries.NameCountry', 'like', '%' . $dest . '%');
            })

            ->when($range == null, function ($query) use ($room) {
                $query->where(function ($subquery) use ($room) {
                    $subquery->whereIn('Hotel_rooms.PriceRoom', function ($subquery) use ($room) {
                        $subquery->select(DB::raw('MIN(hr2.PriceRoom)'))
                            ->from('hotel_rooms as hr2')
                            ->where('hr2.QuantityRoom', '>=', $room) // Check if QuantityRoom is greater than or equal to user input
                            ->whereRaw('hotels.IDHotel = hr2.IDHotel');
                    });
                });
            })
            ->when($range == 'low', function ($query) use ($room) {
                $query->where(function ($subquery) use ($room) {
                    $subquery->whereIn('Hotel_rooms.PriceRoom', function ($subquery) use ($room) {
                        $subquery->select(DB::raw('MIN(hr2.PriceRoom)'))
                            ->from('hotel_rooms as hr2')
                            ->where('hr2.PriceRoom', '<', 100)
                            ->where('hr2.QuantityRoom', '>=', $room) // Check if QuantityRoom is greater than or equal to user input
                            ->whereRaw('hotels.IDHotel = hr2.IDHotel');
                    });
                });
            })
            ->when($range == 'mid', function ($query) use ($room) {
                $query->where(function ($subquery) use ($room) {
                    $subquery->whereIn('Hotel_rooms.PriceRoom', function ($subquery) use ($room) {
                        $subquery->select(DB::raw('MIN(hr2.PriceRoom)'))
                            ->from('hotel_rooms as hr2')
                            ->whereBetween('hr2.PriceRoom', [120, 150])
                            ->where('hr2.QuantityRoom', '>=', $room) // Check if QuantityRoom is greater than or equal to user input
                            ->whereRaw('hotels.IDHotel = hr2.IDHotel');
                    });
                });
            })
            ->when($range == 'high', function ($query) use ($room) {
                $query->where(function ($subquery) use ($room) {
                    $subquery->whereIn('Hotel_rooms.PriceRoom', function ($subquery) use ($room) {
                        $subquery->select(DB::raw('MIN(hr2.PriceRoom)'))
                            ->from('hotel_rooms as hr2')
                            ->where('hr2.PriceRoom', '>', 150)
                            ->where('hr2.QuantityRoom', '>=', $room) // Check if QuantityRoom is greater than or equal to user input
                            ->whereRaw('hotels.IDHotel = hr2.IDHotel');
                    });
                });
            })
            ->get(),

            'dest'=> $dest,
            'inDate'=>$inDate,
            'outDate'=>$outDate,
            'room'=>$room,
            'guest'=>$guest,
            'range'=>$range,
            "countries" => Country::all(),
            "airports" => Airport::all(),
            "cities" => City::all(),
            "hotel_list" => Hotel::all()
        ]);
    }

    // public function detail() {
    //     return view("hotel-room");
    // }
}
