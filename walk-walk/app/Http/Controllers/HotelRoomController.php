<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\HotelFacilityDetail;
use App\Models\HotelFacilityHeader;
use App\Models\HotelRooms;
use App\Models\OrderedRoom;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class HotelRoomController extends Controller
{
    public function index($id){
        //set variable
        $destination = request()->get('destination');
        $inDate = request()->get("inDate");
        $outDate = request()->get("outDate");
        $room = request()->get("room");
        $guest = request()->get("guest");

        $hotel = Hotel::query()->where('IDHotel', $id)->first();
        $roomTypes = HotelRooms::with('facilities')->where('IDHotel', $id)->where('QuantityRoom', '>=', $room)->get();
        $totalRoomTypes = $roomTypes->count();

        // retrieves reviews for a specific hotel identified by $id
        $reviews = Review::query()
        ->join('Users', 'Users.id', '=', 'reviews.id')
        ->where('reviews.IDHotel', '=', $id)
        ->get();

        // $averageRating = Review::where('IDHotel', $id)->avg('Rating');

        // calculates the count of reviews for a specific hotel identified by $id
        $reviewsCount = Review::query()
        ->join('Users', 'Users.id', '=', 'reviews.id')
        ->where('reviews.IDHotel', '=', $id)
        ->count();

        // retrieves hotel facilities for a specific hotel identified by $id
        $hotelFacilities = HotelFacilityHeader::query()
        ->join('hotel_facility_details', 'Hotel_Facility_Headers.IDDetailFacilityHotel', '=', 'Hotel_Facility_Details.IDDetailFacilityHotel')
        ->where('Hotel_Facility_Headers.IDHotel', '=', $id)
        ->get();

        // creates a valid folder name ($hotelFolder) for a hotel based on its name by replacing hyphens with underscores and using a slug. Then, it fetches all files in the directory corresponding to the hotel room photos.
        $hotelFolder = str_replace('-', '_', Str::slug($hotel->NameHotel));
        $hotelPhotos = File::files(public_path("assets/hotelRoom/{$hotelFolder}"));

        // $roomPhotos = [];
        // foreach ($roomTypePhotos as $roomTypePhoto) {
        //     // if (strpos($roomTypePhoto->TypeRoom, ' ') !== false) {
        //     //     // Jika ada spasi, kita ubah namanya untuk mendapatkan folder yang valid
        //     //     $roomFolder = str_replace('-', '_', Str::slug($roomTypePhoto->TypeRoom));
        //     // } else {
        //     //     // Jika tidak ada spasi, kita gunakan nama tipe kamar langsung
        //     //     $roomFolder = $roomTypePhoto->TypeRoom;
        //     // }
        //     // $roomPhotos = File::files(public_path("assets/roomType/{$roomFolder}"));

        //     //Menggunakan slug untuk membuat folder yang valid
        //     $roomFolder = str_replace('-', '_', Str::slug($roomTypePhoto->TypeRoom));
        //     //Mendapatkan foto-foto tipe kamar
        //     $roomPhotos[$roomTypePhoto->TypeRoom] = File::files(public_path("assets/roomType/{$roomFolder}"));
        // }
        // $roomFolder = str_replace('-', '_', Str::slug($roomTypePhoto->TypeRoom));
        // $roomPhotos = File::files(public_path("assets/roomType/{$roomFolder}"));

        //return view and its variable
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
            'hotelFacilities'=>$hotelFacilities,
            'hotelFolder' => $hotelFolder,
            'hotelPhotos' => $hotelPhotos,         
            "countries" => Country::all(),
            "airports" => Airport::all(),
            "cities" => City::all(),
            "hotel_list" => Hotel::all(),
            "orderedRooms" => OrderedRoom::all()
        ]);
    }
}
