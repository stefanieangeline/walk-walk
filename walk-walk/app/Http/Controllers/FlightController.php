<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\City;
use App\Models\Schedule;
use Illuminate\Http\Request;
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
        $depDate = request()->get("departureDate");
        $queryarrivaltime = "CAST(schedules.ArrivalTime as time) as ArrivalTime";
        $querydeparturetime = "CAST(schedules.DepartureTime as time) as DepartureTime";

        if ($class == null) {
            $class = "economy";
        }

        if ($source != "" && $dest != "") {
            $IDsource = City::query()->where("nameCity", "like", "%".$source."%")->first()->IDCity;
            $IDdest = City::query()->where("nameCity", "like","%".$dest."%")->first()->IDCity;

            return view('flight',[
                'schedules' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->join('airports as b','schedules.IDAirportDestination','=','b.IDAirport')
                ->join('airports as a','schedules.IDAirportSource','=','a.IDAirport')
                ->select(DB::raw($querydeparturetime),DB::raw($queryarrivaltime),'schedule_details.Price','a.CodeAirport as CodeAirportSource','b.CodeAirport as CodeAirportDestination')->distinct()
                ->where('schedule_details.Class','like', $class)
                ->where('a.IDAirport', $IDsource)
                ->where('b.IDAirport', $IDdest)
                ->get(),

                'averagePrice' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->where('schedule_details.Class', 'like',$class)
                ->avg('schedule_details.Price'),

                'minimumPrice' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->where('schedule_details.Class','like', $class)
                ->min('schedule_details.Price'),

                'source' => $source,
                'dest' => $dest
            ]);
        } else {
            return view('flight',[
                'schedules' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->join('airports as b','schedules.IDAirportDestination','=','b.IDAirport')
                ->join('airports as a','schedules.IDAirportSource','=','a.IDAirport')
                ->select(DB::raw($querydeparturetime),DB::raw($queryarrivaltime),'schedule_details.Price','a.CodeAirport as CodeAirportSource','b.CodeAirport as CodeAirportDestination')->distinct()
                ->where('schedule_details.Class','like', $class)
                ->get(),

                'averagePrice' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->where('schedule_details.Class', 'like',$class)
                ->avg('schedule_details.Price'),

                'minimumPrice' => Schedule::query()
                ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
                ->where('schedule_details.Class','like', $class)
                ->min('schedule_details.Price'),

                'source' => $source,
                'dest' => $dest
            ]);
        }
    }
}
