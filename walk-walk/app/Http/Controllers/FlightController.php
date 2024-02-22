<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Passenger;
use App\Models\PlanePayment;
use App\Models\PlaneTicket;
use App\Models\PlaneTicketDetail;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    public function ticket() {
        // set variable and raw query
        $IDTicket = request()->get("IDTicket");
        $date_format = "DATE_FORMAT(schedules.DepartureTime, \"%W, %d %M %Y\") as day";

        // get schedules
        $schedule = Schedule::join("plane_tickets", "plane_tickets.IDSchedule", "=", "schedules.IDSchedule")
            ->join("airports as a", "schedules.IDAirportDestination", "=", "a.IDAirport")
            ->join("airports as b", "schedules.IDAirportSource", "=", "b.IDAirport")
            ->join("cities as c", "a.IDCity", "=", "c.IDCity")
            ->join("cities as d", "b.IDCity", "=", "d.IDCity")
            ->join("airlines", "airlines.IDAirline", "=", "schedules.IDAirline")
            ->where("plane_tickets.IDPlaneTicket", $IDTicket)
            ->select("schedules.IDAirline", "FlightNumber", "a.NameAirport as AirportDest", "b.NameAirport as AirportSrc", "c.NameCity as cityDest", "d.NameCity as citySrc", DB::raw($date_format), DB::raw("CAST(schedules.DepartureTime as TIME) as DepartureTime"), DB::raw("CAST(schedules.ArrivalTime as TIME) as ArrivalTime"))
            ->first();

        // get tickets
        $tickets = PlaneTicket::join("plane_ticket_details", "plane_ticket_details.IDPlaneTicket", "=", "plane_tickets.IDPlaneTicket")
            ->join("passengers", "passengers.IDPassenger", "=", "plane_ticket_details.IDPassenger")
            ->where("plane_ticket_details.IDPlaneTicket", $IDTicket)
            ->get();

        // return page and its variable
        return view("e-ticket-page", ["schedule" => $schedule, "tickets" => $tickets]);
    }

    public function paymentSuccess() {
        // set variable
        $IDTicket = request()->get("IDTicket");

        // make new payment with user id
        $newPayment = new PlanePayment();
        $newPayment->IDPlaneTicket = $IDTicket;
        $newPayment->id = Auth::user()->id;
        $newPayment->save();

        // set status payment to true
        PlaneTicket::where("IDPlaneTicket", $IDTicket)->update(array("status"=>1));

        // return page and its variable
        return redirect()->route("paymentSuccessful", ["IDTicket" => $IDTicket]);
    }

    public function paymentSuccessful(){
        // set variable
        $IDTicket = request()->get("IDTicket");
        $price =  request()->get("price");

        // get transaction from ID ticket
        $TransactionID = PlanePayment::where("plane_payments.IDPlaneTicket", $IDTicket)
                        ->first();

        // get date and time of booked ticket
        $dateAndTime = PlaneTicket::where("IDPlaneTicket", $IDTicket)->first();

        // get schedules
        $schedule = Schedule::join("plane_tickets", "plane_tickets.IDSchedule", "=", "schedules.IDSchedule")
                        ->join("airports as a", "schedules.IDAirportDestination", "=", "a.IDAirport")
                        ->join("airports as b", "schedules.IDAirportSource", "=", "b.IDAirport")
                        ->join("cities as c", "a.IDCity", "=", "c.IDCity")
                        ->join("cities as d", "b.IDCity", "=", "d.IDCity")
                        ->join("airlines", "airlines.IDAirline", "=", "schedules.IDAirline")
                        ->select("FlightNumber", "a.CodeAirport as AirportDestinationCode", "b.CodeAirport as AirportSourceCode", "c.NameCity as cityDest", "d.NameCity as citySrc", "airlines.NameAirline")
                        ->first();

        // return page and its variable
        return view("flight-payment", ["price" => $price, "TransactionID" => $TransactionID, "dateAndTime" => $dateAndTime, "schedule" => $schedule, "IDTicket" => $IDTicket]);
    }

    public function barcode() {
        // get variable
        $price = request()->get("price");
        $ticket = request()->get("ticket");

        return view("payment-barcode", [
            "price" => $price,
            "ticket" => $ticket
        ]);
    }

    public function paymentCreate() {
        // get variable
        $names = request()->get("passengersName");
        $genders = request()->get("passengersGender");
        $DOBs= request()->get("passengersDOB");
        $nationalities= request()->get("passengersNationality");
        $price = request()->get("price");
        $IDSchedule = request()->get("IDSchedule");
        $class = request()->get("class");

        // split string into array
        $names = explode (",", $names);
        $genders = explode (",", $genders);
        $DOBs = explode (",", $DOBs);
        $nationalities = explode (",", $nationalities);

        // make new ticket
        $newTicket = new PlaneTicket();
        $newTicket->IDSchedule = $IDSchedule;
        $newTicket->status = 0;
        $newTicket->BookDate = date("Y-m-d");
        $newTicket->save();

        // make every passenger and ticket detail
        for ($i = 0; $i < count($names); $i++) {
            $newPassenger = new Passenger();
            $newPassenger->NamePassenger = $names[$i];
            $newPassenger->GenderPassenger = $genders[$i];
            $newPassenger->DOBPassenger = $DOBs[$i];
            $newPassenger->NationalityPassenger = Country::where("NameCountry", $nationalities[$i])->select("IDCountry")->first()->IDCountry;
            $newPassenger->save();

            $newTicketDetail = new PlaneTicketDetail();
            $newTicketDetail->IDPlaneTicket = $newTicket->id;
            $newTicketDetail->IDPassenger = $newPassenger->id;
            $newTicketDetail->Class = $class;
            $newTicketDetail->save();
        }

        // return page and its variable
        return redirect()->route("payment", [
            "price" => $price,
            "ticket" => $newTicket->id]
        );
    }
    public function passenger($id) {
        // get variable
        $class = request()->get("class");
        $depDate = request()->get("date");
        $senior = request()->get('senior');
        $adult = request()->get('adult');
        $children = request()->get('children');

        // if class null then set value economy
        if ($class == null) {
            $class = "economy";
        }

        // return page and its value
        return view("passanger-detail", [
            "schedule" =>
            Schedule::query()
            ->join("airports as a", "a.IDAirport", "=", "schedules.IDAirportSource")
            ->join("airports as b", "b.IDAirport", "=", "schedules.IDAirportDestination")
            ->join("cities as c", "c.IDCity", "=", "a.IDCity")
            ->join("cities as d", "d.IDCity", "=", "b.IDCity")
            ->join("schedule_details as sd", "sd.IDSchedule", "=", "schedules.IDSchedule")
            ->where("schedules.IDSchedule", $id)
            ->where("sd.Class", $class)
            ->select("Price", "c.NameCity as srcCity", "d.NameCity as destCity", "a.CodeAirport as srcCode", "b.CodeAirport as destCode", "a.NameAirport as srcName", "b.NameAirport as destName", "IDAirline", DB::raw("CAST(DepartureTime AS TIME) as DepartureTime"), DB::raw("CAST(ArrivalTime AS TIME) as ArrivalTime"), "IDAirline", DB::raw("DATE_FORMAT(CAST(DepartureTime AS DATE), \"%M %d, %Y\") as dateFormat"))
            ->first(),
            "class" => $class,
            "depDate" => $depDate,
            "senior" => $senior,
            "adult" => $adult,
            "children" => $children,
            "id" => $id,
            "countries" => Country::all()
        ]);
    }

    public function index(){
        // get variable
        $class = request()->get("class");
        $source = request()->get("source");
        $dest = request()->get("destination");
        $depDate = request()->get("date");
        $senior = request()->get('senior');
        $adult = request()->get('adult');
        $children = request()->get('children');
        $sel_airline = request()->get('sel_airline');
        $range = request()->get('range');
        $sort = request()->get('sort');
        // dd($source);

        // if some variable null then will get set default value
        if ($class == null) {
            $class = "economy";
        }

        if ($sel_airline == null) {
            $sel_airline = "";
        }

        if ($senior == null) {
            $senior = 0;
        }

        if ($children == null) {
            $children = 0;
        }

        if ($adult == null) {
            $adult = 0;
        }

        if ($depDate == null) {
            $depDate = date("Y-m-d");
        }

        // raw query
        $addOneDay = "DATE_ADD(\"".$depDate."\", INTERVAL 1 DAY)";
        $queryarrivaltime = "CAST(schedules.ArrivalTime as time) as ArrivalTime";
        $querydeparturetime = "CAST(schedules.DepartureTime as time) as DepartureTime";

        // if source and destination filled then will return this query
        if ($source != "" && $dest != "") {
            $finalIDsource = [];
            $finalIDdest = [];

            $countrySrc = Country::query()->where("NameCountry", "like", "%".$source."%")->select("NameCountry")->first();
            $citySrc = City::query()->where("NameCity", "like", "%".$source."%")->select("NameCity")->first();
            $airportSrc = Airport::query()->where("NameAirport","like", "%".$source."%")->select("IDAirport")->first();

            $countryDst = Country::query()->where("NameCountry", "like", "%".$dest."%")->select("NameCountry")->first();
            $cityDst = City::query()->where("NameCity", "like", "%".$dest."%")->select("NameCity")->first();
            $airportDst = Airport::query()->where("NameAirport", "like", "%".$dest."%")->select("IDAirport")->first();

            if ($countrySrc != null) {
                $IDsource = Airport::query()
                    ->join("cities", "cities.IDCity", "=", "airports.IDCity")
                    ->join("countries", "countries.IDCountry", "=", "cities.IDCountry")
                    ->where("NameCountry", $countrySrc["NameCountry"])
                    ->select("IDAirport")
                    ->get()
                    ->toArray();

                foreach ($IDsource as $i) {
                    array_push($finalIDsource, $i["IDAirport"]);
                }
            } else if ($citySrc != null) {
                $IDsource = Airport::query()
                    ->join("cities", "cities.IDCity", "=", "airports.IDCity")
                    ->where("NameCity", $citySrc["NameCity"])
                    ->select("IDAirport")
                    ->get()
                    ->toArray();

                foreach ($IDsource as $i) {
                    array_push($finalIDsource, $i["IDAirport"]);
                }
            } else if ($airportSrc != null) {
                array_push($finalIDsource, $airportSrc["IDAirport"]);
            }

            if ($countryDst != null) {
                $IDdest = Airport::query()
                    ->join("cities", "cities.IDCity", "=", "airports.IDCity")
                    ->join("countries", "countries.IDCountry", "=", "cities.IDCountry")
                    ->where("NameCountry", $countryDst["NameCountry"])
                    ->select("IDAirport")
                    ->get()
                    ->toArray();

                foreach ($IDdest as $i) {
                    array_push($finalIDdest, $i["IDAirport"]);
                }
            } else if ($cityDst != null) {
                $IDdest = Airport::query()
                    ->join("cities", "cities.IDCity", "=", "airports.IDCity")
                    ->where("NameCity", $cityDst["NameCity"])
                    ->select("IDAirport")
                    ->get()
                    ->toArray();

                foreach ($IDdest as $i) {
                    array_push($finalIDdest, $i["IDAirport"]);
                }
            } else if ($airportDst != null) {
                array_push($finalIDdest, $airportDst["IDAirport"]);
            }

            // dd($finalIDdest, $finalIDsource);

            return view('flight',[
                'schedules' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->join('airports as b','schedules.IDAirportDestination','=','b.IDAirport')
                ->join('airports as a','schedules.IDAirportSource','=','a.IDAirport')
                ->select(DB::raw($querydeparturetime),DB::raw($queryarrivaltime),'schedule_details.Price','a.CodeAirport as CodeAirportSource','b.CodeAirport as CodeAirportDestination', 'IDAirline', 'schedules.IDSchedule')->distinct()
                ->where('schedule_details.Class','like', $class)
                ->whereIn('a.IDAirport', $finalIDsource)
                ->whereIn('b.IDAirport', $finalIDdest)
                ->where('schedules.DepartureTime', ">=", $depDate)
                ->whereRaw('schedules.DepartureTime <'.$addOneDay)
                ->when($sel_airline != "", function ($query) use ($sel_airline) {
                    $query->where('IDAirline', $sel_airline);
                })
                ->when($range == "low", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'<=', 100);
                })
                ->when($range == "mid", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 100)
                    ->where('schedule_details.Price' ,'<=', 150);
                })
                ->when($range == "high", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 150);
                })
                ->when($sort == "dsc", function ($query) {
                    $query->orderBy("schedule_details.Price", "asc");
                })
                ->when($sort == "dsc", function ($query) {
                    $query->orderBy("schedule_details.Price", "desc");
                })
                ->get(),

                'averagePrice' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->where('schedule_details.Class', 'like',$class)
                ->whereIn('schedules.IDAirportSource', $finalIDsource)
                ->whereIn('schedules.IDAirportDestination', $finalIDdest)
                ->where('schedules.DepartureTime', ">=", $depDate)
                ->whereRaw('schedules.DepartureTime <'.$addOneDay)
                ->when($sel_airline != "", function ($query) use ($sel_airline) {
                    $query->where('IDAirline', $sel_airline);
                })
                ->when($range == "low", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'<=', 100);
                })
                ->when($range == "mid", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 100)
                    ->where('schedule_details.Price' ,'<=', 150);
                })
                ->when($range == "high", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 150);
                })
                ->avg('schedule_details.Price'),

                'minimumPrice' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->where('schedule_details.Class','like', $class)
                ->whereIn('schedules.IDAirportSource', $finalIDsource)
                ->whereIn('schedules.IDAirportDestination', $finalIDdest)
                ->where('schedules.DepartureTime', ">=", $depDate)
                ->whereRaw('schedules.DepartureTime <'.$addOneDay)
                ->when($sel_airline != "", function ($query) use ($sel_airline) {
                    $query->where('IDAirline', $sel_airline);
                })
                ->when($range == "low", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'<=', 100);
                })
                ->when($range == "mid", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 100)
                    ->where('schedule_details.Price' ,'<=', 150);
                })
                ->when($range == "high", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 150);
                })
                ->min('schedule_details.Price'),

                'source' => $source,
                'dest' => $dest,
                'depDate' => $depDate,
                'senior' => $senior,
                'adult' => $adult,
                'children' => $children,
                'class' => $class,
                "countries" => Country::all(),
                "airports" => Airport::all(),
                "cities" => City::all(),
                "hotels" => Hotel::all(),
                "airlines" => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->where('schedule_details.Class','like', $class)
                ->whereIn('schedules.IDAirportSource', $finalIDsource)
                ->whereIn('schedules.IDAirportDestination', $finalIDdest)
                ->where('schedules.DepartureTime', ">=", $depDate)
                ->whereRaw('schedules.DepartureTime <'.$addOneDay)
                ->when($sel_airline != "", function ($query) use ($sel_airline) {
                    $query->where('IDAirline', $sel_airline);
                })
                ->when($range == "low", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'<=', 100);
                })
                ->when($range == "mid", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 100)
                    ->where('schedule_details.Price' ,'<=', 150);
                })
                ->when($range == "high", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 150);
                })
                ->select("IDAirline")
                ->distinct()
                ->get(),
                "sel_airline" => $sel_airline,
                "range" => $range,
                "sort" => $sort
            ]);
        // if source and destination empty
        } else {
            return view('flight',[
                'schedules' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->join('airports as b','schedules.IDAirportDestination','=','b.IDAirport')
                ->join('airports as a','schedules.IDAirportSource','=','a.IDAirport')
                ->select(DB::raw($querydeparturetime),DB::raw($queryarrivaltime),'schedule_details.Price','a.CodeAirport as CodeAirportSource','b.CodeAirport as CodeAirportDestination', 'IDAirline', 'schedules.IDSchedule')->distinct()
                ->where('schedule_details.Class','like', $class)
                ->where('schedules.DepartureTime', ">=", $depDate)
                ->whereRaw('schedules.DepartureTime <'.$addOneDay)
                ->when($sel_airline != "", function ($query) use ($sel_airline) {
                    $query->where('IDAirline', $sel_airline);
                })
                ->when($range == "low", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'<=', 100);
                })
                ->when($range == "mid", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 100)
                    ->where('schedule_details.Price' ,'<=', 150);
                })
                ->when($range == "high", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 150);
                })
                ->when($sort == "asc", function ($query) {
                    $query->orderBy("schedule_details.Price", "asc");
                })
                ->when($sort == "dsc", function ($query) {
                    $query->orderBy("schedule_details.Price", "desc");
                })
                ->get(),

                'averagePrice' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->where('schedule_details.Class', 'like',$class)
                ->where('schedules.DepartureTime', ">=", $depDate)
                ->whereRaw('schedules.DepartureTime <'.$addOneDay)
                ->when($sel_airline != "", function ($query) use ($sel_airline) {
                    $query->where('IDAirline', $sel_airline);
                })
                ->when($range == "low", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'<=', 100);
                })
                ->when($range == "mid", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 100)
                    ->where('schedule_details.Price' ,'<=', 150);
                })
                ->when($range == "high", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 150);
                })
                ->avg('schedule_details.Price'),

                'minimumPrice' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->where('schedule_details.Class','like', $class)
                ->where('schedules.DepartureTime', ">=", $depDate)
                ->whereRaw('schedules.DepartureTime <'.$addOneDay)
                ->when($sel_airline != "", function ($query) use ($sel_airline) {
                    $query->where('IDAirline', $sel_airline);
                })
                ->when($range == "low", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'<=', 100);
                })
                ->when($range == "mid", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 100)
                    ->where('schedule_details.Price' ,'<=', 150);
                })
                ->when($range == "high", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 150);
                })
                ->min('schedule_details.Price'),

                'source' => $source,
                'dest' => $dest,
                'depDate' => $depDate,
                'senior' => $senior,
                'adult' => $adult,
                'children' => $children,
                'class' => $class,
                "countries" => Country::all(),
                "airports" => Airport::all(),
                "cities" => City::all(),
                "hotels" => Hotel::all(),
                "airlines" => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->where('schedule_details.Class','like', $class)
                ->where('schedules.DepartureTime', ">=", $depDate)
                ->whereRaw('schedules.DepartureTime <'.$addOneDay)
                ->when($sel_airline != "", function ($query) use ($sel_airline) {
                    $query->where('IDAirline', $sel_airline);
                })
                ->when($range == "low", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'<=', 100);
                })
                ->when($range == "mid", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 100)
                    ->where('schedule_details.Price' ,'<=', 150);
                })
                ->when($range == "high", function ($query) use ($sel_airline) {
                    $query->where('schedule_details.Price' ,'>=', 150);
                })
                ->select("IDAirline")
                ->distinct()
                ->get(),
                "sel_airline" => $sel_airline,
                "range" => $range,
                "sort" => $sort
            ]);
        }
    }
}
