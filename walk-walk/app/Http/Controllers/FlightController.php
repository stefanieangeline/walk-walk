<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Schedule;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    public function minPriceAll($IDAirportSrc, $IDAirportDst) {
        return DB::table("schedules")->where("IDAirportSource", $IDAirportSrc)->where("IDAirportDestination", $IDAirportDst)->get();
    }

    public function old() {
        $schedules = null;
        if (request()->has("src") && request()->has("dst")) {
            $schedules = Schedule::query()->where("IDAirportSource", request()->get("src", ""))->where("IDAirportDestination", request()->get("dst", ""))->get();
        } else {
            $schedules = Schedule::all();
        }

        return view("flight", ['schedules' => $schedules]);
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
                ->select(DB::raw($querydeparturetime),DB::raw($queryarrivaltime),'schedule_details.Price','a.CodeAirport as CodeAirportSource','b.CodeAirport as CodeAirportDestination', 'IDAirline')->distinct()
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
                ->select(DB::raw($querydeparturetime),DB::raw($queryarrivaltime),'schedule_details.Price','a.CodeAirport as CodeAirportSource','b.CodeAirport as CodeAirportDestination', 'IDAirline')->distinct()
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
