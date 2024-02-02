<?php

namespace App\Http\Controllers;

use App\Models\AirportTenantsDetails;
use Illuminate\Http\Request;
use App\Models\Schedule;

class AirportDetailsController extends Controller
{
    public function index(){
        // set variable
        $IDTicket = request()->get("IDTicket");
        $IDAirport = request()->get("IDAirport");
        $Category = request()->get("Category");
        $TenantsAirport = null;

        // if category null then the default value is all
        if ($Category == null || $Category == "") {
            $Category = "All";
        }

        // to get airport destination
        $AirportDestination = Schedule::join("plane_tickets", "plane_tickets.IDSchedule", "=", "schedules.IDSchedule")
        ->join("airports", "schedules.IDAirportDestination", "=", "IDAirport")
        ->select('IDAirportDestination','NameAirport')
        ->where("plane_tickets.IDPlaneTicket", $IDTicket)
        ->first();

        // to get airport source
        $AirportSource = Schedule::join("plane_tickets", "plane_tickets.IDSchedule", "=", "schedules.IDSchedule")
        ->join("airports", "schedules.IDAirportSource", "=", "IDAirport")
        ->select('IDAirportSource','NameAirport')
        ->where("plane_tickets.IDPlaneTicket", $IDTicket)
        ->first();

        // if id airport user input null then will get set to aiport source
        if (!$IDAirport) {
            $IDAirport = $AirportSource->IDAirportSource; // atau $AirportDestination->IDAirportDestination;
        }

        // if category all will get all tenants
        if ($Category == "All") {
            $TenantsAirport = AirportTenantsDetails::join("airport_tenants_headers", "airport_tenants_headers.IDTenants","=","airport_tenants_details.IDTenants")
            ->where("airport_tenants_headers.IDAirport","=", $IDAirport)
            ->get();
        // if category is specific then will get specific tenants
        } else {
            $TenantsAirport = AirportTenantsDetails::join("airport_tenants_headers", "airport_tenants_headers.IDTenants","=","airport_tenants_details.IDTenants")
            ->where("airport_tenants_headers.IDAirport","=", $IDAirport)
            ->where("airport_tenants_details.CategoryTenants","=", $Category)
            ->get();
        }

        // return page and all its variable
        return view('airport-detail',
        ["AirportSource" => $AirportSource,
        "AirportDestination" => $AirportDestination,
        "TenantsAirport" => $TenantsAirport,
        "IDTicket" => $IDTicket,
        'IDAirport'=> $IDAirport,
        'Category' => $Category
        ]);






    }
}
