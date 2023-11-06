<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\map;

class ApiApartmentController extends Controller
{
    public function premium(Request $request)
    {
        $apartments = Apartment::premium()->get();
        $sherableApartments = array_map(function ($apartment) {
            $apartment['coordinates'] = DB::table('apartments')
                ->selectRaw("ST_X(coordinates) as latitude, ST_Y(coordinates) as longitude")
                ->where('id', $apartment['id'])
                ->first();
            return $apartment;
        }, $apartments->toArray());
        return response()->json([
            'success' => true,
            'data' => $sherableApartments
        ]);
    }
    public function index(Request $request)
    {
        if (isset($request->lat) && isset($request->lon)) {
            $longitude = $request->lon;
            $latitude = $request->lat;
            $radius = isset($request->radius) ? $request->radius : 20;
            $services = $request->services ? explode(' ', $request->services) : [];
            //$sherableApartments = Apartment::near($longitude, $latitude, $radius)->get();
            $sherableApartments = Apartment::query()
            ->near($longitude, $latitude, $radius)
            ->visible()
            ->sponsorEnd()
            ->when($services, function ($query, $services) {
                foreach ($services as $service) {
                    $query->whereHas('services', function ($subquery) use ($service) {
                        $subquery->where('service_id', $service);
                    });
                }
            })
            ->where('beds', '>=', $request->beds ?? 1)
            ->where('rooms', '>=', $request->rooms ?? 1)
            ->with(['services'])
            ->orderBy($request->order ?? 'distance', 'asc')
            ->get();

            return response()->json([
                'success' => true,
                'results' => $sherableApartments,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Lat and/or Long are missing'
            ], 400);
        }
    }
}
