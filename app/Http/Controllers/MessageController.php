<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Apartment;
use App\Models\User;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Apartment $apartment)
    {
        $allMessageOfApartment = $apartment->messages()->orderBy('created_at', 'desc')->paginate('10');
        return view('messages.index', compact('allMessageOfApartment'));
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
    public function store(StoreMessageRequest $request)
    {
        $newMessage = new Message();
        $newMessage->apartment_id = $request->apartment_id;
        $newMessage->name = $request->name;
        $newMessage->lastname = $request->lastname;
        $newMessage->email = $request->email;
        $newMessage->text = $request->text;
        $newMessage->save();
        return response()->json($newMessage, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
