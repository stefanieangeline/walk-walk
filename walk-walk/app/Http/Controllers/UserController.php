<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\PlanePayment;
use App\Models\PlaneTicket;
use App\Models\OrderedRoom;
use App\Models\Schedule;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dummy() {
        $user = new User();
        $user->name = "Stef";
        $user->email = "stef@email.com";
        $user->password = bcrypt("password");
        $user->NoTelpUser = "08123456789";
        $user->DOBUser = "2000-01-01";
        $user->NationalityUser = 1;
        $user->save();

        return redirect()->route("home");
    }

    //retrieves the user's nationality from the authenticated user's information and passes the corresponding country name to the "myaccount" view
    public function index() {
        $user = Auth::user()->NationalityUser;
        return view("myaccount",['country'=> Country::where('IDCountry', $user)->first()->NameCountry]);
    }

    //retrieves flight and hotel booking details for the currently authenticated user, considering future departure dates and check-out dates. The data includes flight and hotel information such as airports, cities, departure/arrival times, hotel names, check-in/out dates, and the number of nights. This information is then passed to the "booking-detail" view.
    public function bookingDetail() {
        $IDUser = Auth::user()->id;

        $flights = PlanePayment::where("id", $IDUser)
            ->join("plane_tickets", "plane_tickets.IDPlaneTicket", "=", "plane_payments.IDPlaneTicket")
            ->join("schedules", "schedules.IDSchedule", "=", "plane_tickets.IDSchedule")
            ->join("airports as a", "schedules.IDAirportDestination", "=", "a.IDAirport")
            ->join("airports as b", "schedules.IDAirportSource", "=", "b.IDAirport")
            ->join("cities as c", "a.IDCity", "=", "c.IDCity")
            ->join("cities as d", "b.IDCity", "=", "d.IDCity")
            ->join("airlines", "airlines.IDAirline", "=", "schedules.IDAirline")
            ->where("schedules.DepartureTime", ">=", DB::raw("now()"))
            ->select("plane_tickets.IDPlaneTicket", "a.NameAirport as AirportDest", "b.NameAirport as AirportSrc", "a.CodeAirport as CodeDest", "b.CodeAirport as CodeSrc", "c.NameCity as CityDest", "d.NameCity as CitySrc", DB::raw("CONCAT(DATE_FORMAT(schedules.DepartureTime, \"%d %M %Y\"), \" \", CAST(schedules.DepartureTime as TIME)) as departureTime"), DB::raw("CONCAT(DATE_FORMAT(schedules.ArrivalTime, \"%d %M %Y\"), \" \", CAST(schedules.ArrivalTime as TIME)) as arrivalTime"))
            ->distinct()
            ->get();

        $orderedRooms = OrderedRoom::where("id", $IDUser)
                    ->join("hotels", "hotels.IDHotel", "=", "ordered_rooms.IDHotel")
                    ->where("ordered_rooms.CheckOutDate", ">=", DB::raw("now()"))
                    ->select("ordered_rooms.*", "hotels.NameHotel",
                                DB::raw("DATE_FORMAT(ordered_rooms.CheckInDate, '%d %M %Y') as CheckInDate"),
                                DB::raw("DATE_FORMAT(ordered_rooms.CheckOutDate, '%d %M %Y') as CheckOutDate"),
                                DB::raw("DATEDIFF(ordered_rooms.CheckOutDate, ordered_rooms.CheckInDate) as NumberOfNights")
                            )
                    ->distinct()
                    ->get();

        return view("booking-detail", ["flights" => $flights, "orderedRooms" => $orderedRooms]);
    }

    // fetches the historical flight and hotel booking details for the currently authenticated user, considering past departure dates and check-out dates. The data includes information such as airports, cities, departure/arrival times, hotel names, check-in/out dates, the number of nights, and ticket classes. This information is then passed to the "history" view for display.
    public function history() {
        $IDUser = Auth::user()->id;

        $flights = PlanePayment::where("id", $IDUser)
            ->join("plane_tickets", "plane_tickets.IDPlaneTicket", "=", "plane_payments.IDPlaneTicket")
            ->join("schedules", "schedules.IDSchedule", "=", "plane_tickets.IDSchedule")
            ->join("plane_ticket_details", "plane_ticket_details.IDPlaneTicket", "=", "plane_tickets.IDPlaneTicket")
            ->join("schedule_details", "schedule_details.IDSchedule", "=", "schedules.IDSchedule")
            ->join("airports as a", "schedules.IDAirportDestination", "=", "a.IDAirport")
            ->join("airports as b", "schedules.IDAirportSource", "=", "b.IDAirport")
            ->join("cities as c", "a.IDCity", "=", "c.IDCity")
            ->join("cities as d", "b.IDCity", "=", "d.IDCity")
            ->join("airlines", "airlines.IDAirline", "=", "schedules.IDAirline")
            ->where("schedules.DepartureTime", "<", DB::raw("now()"))
            ->select("plane_ticket_details.Class as c1", "schedule_details.Class as c2", "plane_tickets.IDPlaneTicket", "a.NameAirport as AirportDest", "b.NameAirport as AirportSrc", "a.CodeAirport as CodeDest", "b.CodeAirport as CodeSrc", "c.NameCity as CityDest", "d.NameCity as CitySrc", DB::raw("CONCAT(DATE_FORMAT(schedules.DepartureTime, \"%d %M %Y\"), \" \", CAST(schedules.DepartureTime as TIME)) as departureTime"), DB::raw("CONCAT(DATE_FORMAT(schedules.ArrivalTime, \"%d %M %Y\"), \" \", CAST(schedules.ArrivalTime as TIME)) as arrivalTime"))
            ->distinct()
            ->get();
        $orderedRooms = OrderedRoom::where("id", $IDUser)
            ->join("hotels", "hotels.IDHotel", "=", "ordered_rooms.IDHotel")
            ->where("ordered_rooms.CheckOutDate", "<=", DB::raw("now()"))
            ->select("ordered_rooms.*", "hotels.NameHotel",
                        DB::raw("DATE_FORMAT(ordered_rooms.CheckInDate, '%d %M %Y') as CheckInDate"),
                        DB::raw("DATE_FORMAT(ordered_rooms.CheckOutDate, '%d %M %Y') as CheckOutDate"),
                        DB::raw("DATEDIFF(ordered_rooms.CheckOutDate, ordered_rooms.CheckInDate) as NumberOfNights")
                    )
            ->distinct()
            ->get();


        return view("history", ["flights" => $flights, "orderedRooms" => $orderedRooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $user = User::where('IDUser', $id)->first();
    //     return view('myaccount', compact('user'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
