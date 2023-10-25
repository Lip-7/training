<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); 
        $apartments = $user->apartments; 
    
        return view("admin.apartments.index", compact("apartments"));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        // $visibleOptions = ['si', 'no'];
        // $selectedValue = 'si'; // Qui dovresti avere il valore selezionato dal tuo input radio

        // $visible = false; // Inizializza come false per gestire un valore predefinito

        // if ($selectedValue === 'si') {
        //     $visible = true;
        // }
        return view('admin.apartments.create', compact("services"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApartmentRequest $request)
    {
        $data = $request->validated();
        $user_id = ['user_id' => Auth::id()];
        $data = array_merge($data, $user_id);
        $data['slug'] = Str::slug($data['name']);
        $apartment = Apartment::create($data);
        if ($request->has('services')) {
            $apartment->services()->attach($request->services);
        }

        return redirect()->route('apartments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        $visits = $apartment->visits;
        return view("apartments.show", compact("apartment", "visits"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();
        $checkedServices = $apartment->services->pluck('id')->toArray();
        return view("admin.apartments.edit", compact("services", "apartment", "checkedServices"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $data = $request->validated();
        /* dovremmo ricavare lon e lat con una api, per ora inventiamo: */
        $data['lat'] = 80.00000000;
        $data['lon'] = 170.00000000;
        /*  */
        $apartment->update($data);
        $data['user_id'] = Auth::id();
        if ($request->has("services")) {
            $apartment->services()->sync($request->services);
        } else {
            $apartment->services()->sync([]);
        }


        return redirect()->route("apartments.show", compact("apartment"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('apartments.index')->with('message', "Your project: '$apartment->name', has been successfully deleted");
    }
}
