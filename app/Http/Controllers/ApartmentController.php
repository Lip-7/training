<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ApartmentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Apartment::class, "apartment");
    }
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
    public function create(Apartment $apartment)
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
        $data['coordinates'] = DB::raw("ST_GeomFromText('POINT(" . $data['coordinates'] . ")',0)");
        $apartment = Apartment::create($data);
        if ($request->has('services')) {
            $apartment->services()->attach($request->services);
        }

        return redirect()->route("apartments.show", compact("apartment"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        $visits = $apartment->visits;
        return view("admin.apartments.show", compact("apartment", "visits"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
        // $this->authorize('edit', $apartment);
        $services = Service::all();
        $checkedServices = $apartment->services->pluck('id')->toArray();
        $coordinates = Apartment::cleanCoordinates($apartment->coordinates);
        return view("admin.apartments.edit", compact("services", "apartment", "checkedServices", "coordinates"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        $data = $request->validated();
        /* dovremmo ricavare lon e lat con una api, per ora inventiamo: */
        /*  */
        $data['coordinates'] = DB::raw("ST_GeomFromText('POINT(" . $data['coordinates'] . ")',0)");
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
