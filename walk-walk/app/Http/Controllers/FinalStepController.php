<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\OrderedRoom;
use Illuminate\Http\Request;

class FinalStepController extends Controller
{
    public function index(){       
        return view('final-step');
    }
}
