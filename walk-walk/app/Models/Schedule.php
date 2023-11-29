<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Schedule extends Model
{
    use HasFactory;



    public function minPriceInSchedule($id) {
        $min = INF;
        foreach (DB::table("schedule_details")->where("IDSchedule", $id)->get() as $detail) {
            if ($detail->Price < $min) {
                $min = $detail->Price;
            }
        }
        return $min;
    }

    public function getAirportCode($IDAirport) {
        return DB::table("airports")->where("IDAirport", $IDAirport)->first()->CodeAirport;
    }
}
