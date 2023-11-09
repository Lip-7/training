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
        $apartments = Apartment::premium()
        ->visible()
        ->get();
        return response()->json([
            'success' => true,
            'data' => $apartments
        ]);
    }
    public function index(Request $request)
    {
        $services = Service::all();
        $apartmets = Apartment::query()
        ->premium()->visible()->get();
        return response()->json([
            "success" => true,
            "apartmets" => $apartmets,
            "services" => $services
        ]);
    }
    public function search(Request $request)
    {
        if (isset($request->lat) && isset($request->lon)) {
            $longitude = $request->lon;
            $latitude = $request->lat;
            $radius = isset($request->radius) ? $request->radius : 2000;
            $services = $request->services ? explode(' ', $request->services) : [];
            $sherableApartments = Apartment::query()
                ->near($longitude, $latitude, $radius)
                ->visible()
                ->sponsorEnd()
                ->visits()
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
