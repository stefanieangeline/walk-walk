<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    public function minPriceAll($IDAirportSrc, $IDAirportDst) {
        return DB::table("schedules")->where("IDAirportSource", $IDAirportSrc)->where("IDAirportDestination", $IDAirportDst)->get();
    }

    public function index() {
        $schedules = null;
        if (request()->has("src") && request()->has("dst")) {
            $schedules = Schedule::query()->where("IDAirportSource", request()->get("src", ""))->where("IDAirportDestination", request()->get("dst", ""))->get();
        } else {
            $schedules = Schedule::all();
        }

        return view("flight", ['schedules' => $schedules]);
    }
    public function index1(){
        // $schedules1 = Schedule::select('schedules.*')->join('schedule_details','schedule_details.IDSchedule','=','IDSchedule');
        // echo $schedules1;
        return view('flight',[
        'schedules' => Schedule::query()
        ->join('schedule_details','schedule_details.IDSchedule','=','schedules.IDSchedule')
        ->join('airports as b','schedules.IDAirportDestination','=','b.IDAirport')
        ->join('airports as a','schedules.IDAirportSource','=','a.IDAirport')
        ->select('schedules.*','a.CodeAirport as CodeAirportSource','b.CodeAirport as CodeAirportDestination')->distinct()
        ->get(),
        // 'airportsource' => Airport::select('airports.CodeAirport')
        // ->join('airports','schedules.IDAirportSource','=','airports.IDAirport')
        // ->get(),
        // 'airportdestination' => Airport::select('airports.CodeAirport')
        // ->join('airports','schedules.IDAirportDestination','=','airports.IDAirport')
        // ->get(),
        // 'count' => Schedule::query()
        // ->select('count(IDSchedule)') 
        // ->get()

        
    ]);
        
    }
}
