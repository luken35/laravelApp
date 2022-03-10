<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function Showroom()
    {
        return view('showroom', [
            'vehicles' => Vehicle::all()
        ]);
    }
}
