<?php

namespace App\Http\Controllers;

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
}
