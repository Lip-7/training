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
        //inserire un dato posizione?

        $query = Apartment::query();

        $apartments = $query->get();
        // if no apartments were found, return an error message
        if (count($apartments) == 0) {
            return response()->json([
                'success' => false,
                'error' => 'No apartments found',
            ]);
        }
        return response()->json([
            'success' => true,
            'results' => $apartments,
        ]);
        // se la struttura offre servizi, includiamoli nella ricerca.
        // if ($request->has("service") && $requestData["service"] != "") {
        //     $query->whereHas("services", function ($query) use ($requestData) {
        //         $query->select(DB::raw("apartment_id"))
        //             ->groupBy("apartment_id")
        //     });
        // }

    }
}
