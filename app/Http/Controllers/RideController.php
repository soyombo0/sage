<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use Illuminate\Http\Request;

class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ride = Ride::query()->create([
            'name' => $request['name'],
            'driver_id' => $request['driver_id'],
            'seats' => $request['seats'],
            'car' => $request['car'],
            'departure' => $request['departure'],
        ]);

        return response()->json([
            'message' => "you've created a ride",
            'ride' => $ride
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ride $ride)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ride $ride)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ride $ride)
    {
        //
    }
}
