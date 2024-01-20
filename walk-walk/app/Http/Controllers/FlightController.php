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
    public function minPriceAll($IDAirportSrc, $IDAirportDst) {
        return DB::table("schedules")->where("IDAirportSource", $IDAirportSrc)->where("IDAirportDestination", $IDAirportDst)->get();
    }

    public function paymentSuccess() {
        $IDTicket = request()->get("IDTicket");

        $newPayment = new PlanePayment();
        $newPayment->IDPlaneTicket = $IDTicket;
        $newPayment->id = Auth::user()->id;
        $newPayment->save();

        PlaneTicket::where("IDPlaneTicket", $IDTicket)->update(array("status"=>1));

        return redirect()->route("paymentSuccessful");
    }

    public function paymentSuccessful(){
        $IDTicket = request()->get("IDTicket");
        $price =  request()->get("price");
        $TransactionID = PlaneTicket::where("IDPlaneTicket", $IDTicket)
                        ->join ('plane_payment', 'plane_tickets.IDPlaneTicket', '=', 'plane_payment.IDPlanePayment')
                        ->value ('plane_payment.IDPlanePayment');

        $dateAndTime = PlaneTicket::where("IDPlaneTicket", $IDTicket)->first()->created_at;
        $flightNumber = PlaneTicket::where("IDPlaneTicket", $IDTicket)
                        ->join ('schedules', 'plane_tickets.IDSchedule', '=', 'schedules.IDSchedule')
                        ->value ('schedules.FlightNumber');
        $AirlineName = PlaneTicket::where("IDPlaneTicket", $IDTicket)
                        ->join ('schedules', 'plane_tickets.IDSchedule', '=', 'schedules.IDSchedule')
                        ->join ('airlines', 'schedules.IDAirline', '=', 'airlines.IDAirline')
                        ->value ('airlines.NameAirline');
        $AirportSource = PlaneTicket::where("IDPlaneTicket", $IDTicket)
                        ->join ('schedules', 'plane_tickets.IDSchedule', '=', 'schedules.IDSchedule')
                        ->join ('airports', 'schedules.IDAirportSource', '=', 'airports.IDAirport')
                        ->value ('airports.CodeAirport');
        $AirportDst = PlaneTicket::where("IDPlaneTicket", $IDTicket)
                        ->join ('schedules', 'plane_tickets.IDSchedule', '=', 'schedules.IDSchedule')
                        ->join ('airports', 'schedules.IDAirportDestination', '=', 'airports.IDAirport')
                        ->value ('airports.CodeAirport');
        
        return view("paymentSuccessful", ["price" => $price, "TransactionID" => $TransactionID, "dateAndTime" => $dateAndTime, "flightNumber" => $flightNumber, "AirlineName" => $AirlineName, "AirportSource" => $AirportSource, "AirportDst" => $AirportDst]);
    }


    public function barcode() {
        $price = request()->get("price");
        $ticket = request()->get("ticket");

        return view("payment-barcode", [
            "price" => $price,
            "ticket" => $ticket
        ]);
    }

    public function paymentCreate() {
        $names = request()->get("passengersName");
        $genders = request()->get("passengersGender");
        $DOBs= request()->get("passengersDOB");
        $nationalities= request()->get("passengersNationality");
        $price = request()->get("price");
        $IDSchedule = request()->get("IDSchedule");

        $names = explode (",", $names);
        $genders = explode (",", $genders);
        $DOBs = explode (",", $DOBs);
        $nationalities = explode (",", $nationalities);

        $newTicket = new PlaneTicket();
        $newTicket->IDSchedule = $IDSchedule;
        $newTicket->status = 0;
        $newTicket->BookDate = date("Y-m-d");
        $newTicket->save();

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
            $newTicketDetail->save();
        }

        // dd("tes");
        return redirect()->route("payment", [
            "price" => $price,
            "ticket" => $newTicket->id]
        );
    }
    public function passenger($id) {
        $class = request()->get("class");
        $depDate = request()->get("date");
        $senior = request()->get('senior');
        $adult = request()->get('adult');
        $children = request()->get('children');
        if ($class == null) {
            $class = "economy";
        }

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

        $addOneDay = "DATE_ADD(\"".$depDate."\", INTERVAL 1 DAY)";
        $queryarrivaltime = "CAST(schedules.ArrivalTime as time) as ArrivalTime";
        $querydeparturetime = "CAST(schedules.DepartureTime as time) as DepartureTime";

        if ($source != "" && $dest != "") {
            $IDsource = City::query()->where("nameCity", "like", "%".$source."%")->select("IDCity")->get()->toArray();
            $IDdest = City::query()->where("nameCity", "like","%".$dest."%")->select("IDCity")->get()->toArray();

            return view('flight',[
                'schedules' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->join('airports as b','schedules.IDAirportDestination','=','b.IDAirport')
                ->join('airports as a','schedules.IDAirportSource','=','a.IDAirport')
                ->select(DB::raw($querydeparturetime),DB::raw($queryarrivaltime),'schedule_details.Price','a.CodeAirport as CodeAirportSource','b.CodeAirport as CodeAirportDestination', 'IDAirline', 'schedules.IDSchedule')->distinct()
                ->where('schedule_details.Class','like', $class)
                ->where('a.IDAirport', $IDsource)
                ->where('b.IDAirport', $IDdest)
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
                ->where('schedules.IDAirportSource', $IDsource)
                ->where('schedules.IDAirportDestination', $IDdest)
                ->where('schedules.IDAirportDestination', $IDdest)
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
                ->where('schedules.IDAirportSource', $IDsource)
                ->where('schedules.IDAirportDestination', $IDdest)
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
                ->where('schedules.IDAirportSource', $IDsource)
                ->where('schedules.IDAirportDestination', $IDdest)
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
