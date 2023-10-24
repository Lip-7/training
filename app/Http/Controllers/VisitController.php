<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreVisitRequest $request)
    {
        $recordNotPresent = DB::table('visits')->where([
            ['ip', '=', $request->ip],
            ['apartment_id', '=', $request->apartment_id],
        ])->get()->isEmpty();
        
        if($recordNotPresent) {
            $visit = Visit::create([
                "apartment_id" => $request->apartment_id,
                "date" => $request->date,
                "ip" => $request->ip
            ]);
    
            return response()->json([
                "success" => true,
                "visit" => $visit,
            ]);
        } else {
            return response()->json([
                "success" => true,
                "visit" => "Apartment already visited",
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitRequest $request, Visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        //
    }
}
