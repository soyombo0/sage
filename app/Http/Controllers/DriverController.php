<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = User::query()->where('role_id', '=', 2)->get();

        response()->json([
            'drivers' => $drivers
        ]);
    }

    public function activeIndex()
    {
        $drivers = User::query()->where('role_id', '=', 2)->where('is_active', '=', true)->get();

        response()->json([
            'drivers' => $drivers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request;

        $driver = User::query()->create([
           'name' => $data['name'],
           'role_id' => 2
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        $driver = Driver::query()->
    }
}
