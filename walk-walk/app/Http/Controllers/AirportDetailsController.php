<?php

namespace App\Http\Controllers;

use App\Models\AirportTenantsDetails;
use Illuminate\Http\Request;
use App\Models\Schedule;

class AirportDetailsController extends Controller
{
    public function index(){
        // dd(request()->get("idAirport"));

        $IDTicket = request()->get("IDTicket");
        $IDAirport = request()->get("IDAirport");
        $Category = request()->get("Category");
        $TenantsAirport = null;

        $AirportDestination = Schedule::join("plane_tickets", "plane_tickets.IDSchedule", "=", "schedules.IDSchedule")
        ->join("airports", "schedules.IDAirportDestination", "=", "IDAirport")
        ->select('IDAirportDestination','NameAirport')
        ->where("plane_tickets.IDPlaneTicket", $IDTicket)
        // ->value('IDAirportDestination')
        ->first()
        ;
        // dd($AirportDestination);

        $AirportSource = Schedule::join("plane_tickets", "plane_tickets.IDSchedule", "=", "schedules.IDSchedule")
        ->join("airports", "schedules.IDAirportSource", "=", "IDAirport")
        ->select('IDAirportSource','NameAirport')
        ->where("plane_tickets.IDPlaneTicket", $IDTicket)
        // ->value('IDAirportDestination')
        ->first();
        // dd($AirportDestination->IDAirportDestination);

        if (!$IDAirport) {
            $IDAirport = $AirportSource->IDAirportSource; // atau $AirportDestination->IDAirportDestination;
        }

        if ($Category == "All") {
            $TenantsAirport = AirportTenantsDetails::join("airport_tenants_headers", "airport_tenants_headers.IDTenants","=","airport_tenants_details.IDTenants")
            ->where("airport_tenants_headers.IDAirport","=", $IDAirport)
            ->get();
        } else {
            $TenantsAirport = AirportTenantsDetails::join("airport_tenants_headers", "airport_tenants_headers.IDTenants","=","airport_tenants_details.IDTenants")
            ->where("airport_tenants_headers.IDAirport","=", $IDAirport)
            ->where("airport_tenants_details.CategoryTenants","=", $Category)
            ->get();
        }



        // dd($TenantsAirportSource);

        // dd($TenantsAirport   Destination);

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
