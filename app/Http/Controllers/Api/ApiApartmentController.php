<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiApartmentController extends Controller
{
    public function index(Request $request)
    {
        $requestData = $request->all();

        $services = Service::all();
        $sponsorships = Sponsorship::all();
        $visits = Visit::all();
        //inserire un dato posizione

        $query = Apartment::query();
    }
}
