<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class ApiApartmentController extends Controller
{
    public function premium(Request $request)
    {
        $apartments = Apartment::premium()->get();
        return response()->json([
            'success' => true,
            'data' => $apartments
        ], 200);
    }
    public function index(Request $request)
    {
        $requestData = $request->all();

        $services = Service::all();
        $sponsorships = Sponsorship::all();
        $visits = Visit::all();
        //inserire un dato posizione?

        $query = Apartment::query();

        if (isset($request->lat) && isset($request->lon)) {
            $longitude = $request->lon;
            $latitude = $request->lat;
            $radius = isset($request->radius) ? $request->radius : 20;

            /* $apartments = Apartment::selectRaw(
                "*, ST_Distance(coordinates, POINT($longitude, $latitude)) as distance"
            )
                ->whereRaw('ST_Distance(coordinates, POINT(?, ?)) <= ?', [$longitude, $latitude, $radius])
                ->orderBy('distance', 'asc')
                ->get();

            $sherableApartments = array_map(function ($apartment) {
                $apartment['coordinates'] = DB::table('apartments')
                    ->selectRaw("ST_X(coordinates) as latitude, ST_Y(coordinates) as longitude")
                    ->where('id', $apartment['id'])
                    ->first();
                return $apartment;
            }, $apartments->toArray()); */


            $sherableApartments = Apartment::near($longitude, $latitude, $radius)->get();


        }

        return response()->json([
            'success' => true,
            'results' => $sherableApartments,
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
