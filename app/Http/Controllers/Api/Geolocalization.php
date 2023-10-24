<?php

namespace App\Http\Controllers\Api;

use App\Models\sc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Geolocalization extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Send a querify string and you'll receive the probably address with coordinates .
     */
    public function search(Request $request)
    {
        $query = $request->input("query");
        $apiKey = env('TOMTOM_KEY');
        if (empty($apiKey)) {
            return response()->json(['error' => 'TomTom Api Key not configured'],500);
        }
        $client = new \GuzzleHttp\Client();
        $reponse = $client->get(env("TOMTOM_URL_BEFORE") . $query . '.json?key=' . $apiKey, ['verify' => false]);

        return response()->json([
            'success' => true,
            'response' => json_decode($reponse->getBody()) ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
