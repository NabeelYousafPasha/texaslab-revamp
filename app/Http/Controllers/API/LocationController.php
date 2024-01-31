<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }

    /**
     *
     * @param Request $request
     * @param Location $location
     * 
     * @return JsonResponse
     */
    public function updateLocationStatus(Request $request, Location $location): JsonResponse
    {
        $location->update([
            'status' => $request->input('status'),
        ]);

        return successJsonResponse([
            'message' => 'Status updated',
            'status' => $request->input('status'),
        ]);
    }
}
