<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sponsorship;
use App\Http\Requests\StoreSponsorshipRequest;
use App\Http\Requests\UpdateSponsorshipRequest;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsorships = Sponsorship::all();
        $apartment = Apartment::where('id', Auth::id())->with(['apartment.sponsorships' => function ($query) {
            $query->orderBy('apartment_sponsorship.end_date', 'desc');
        }]);

        return view('admin.sponsorships.index', compact('sponsorships'));
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
    public function store(StoreSponsorshipRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsorship $sponsorship)
    {
        $apartment = Apartment::where('user_id', Auth::id());
        $user = User::where('id', Auth::id())->first();
        // var_dump($user->name);
        return view('admin.sponsorships.show', compact('apartment', 'user', 'sponsorship'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSponsorshipRequest $request, Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsorship $sponsorship)
    {
        //
    }
}
