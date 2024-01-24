<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationProvider\LocationProviderRequest;
use App\Models\{
    Location,
    LocationProvider,
};
use Illuminate\Http\Request;

class LocationProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Location $location)
    {
        return view('pages.admin.location-provider.index')->with([
            'location' => $location,
            'locationProviders' => $location->providers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Location $location)
    {
        $form = [
            'id' => 'create_location_provider',
            'name' => 'create_location_provider',
            'action' => route('admin.location.providers.store', ['location' => $location,]),
            'method' => 'POST',
        ];

        return view('pages.admin.location-provider.form')->with([
            'location' => $location,
            'form' => $form,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Location $location, LocationProviderRequest $request)
    {
        LocationProvider::create($request->validated() + [
            'location_id' => $location->id,
        ]);

        return redirect()->route('admin.location.providers.index', [
            'location' => $location,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location, LocationProvider $locationProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location, LocationProvider $locationProvider)
    {
        $form = [
            'id' => 'edit_form__location_provider',
            'name' => 'edit_form__location_provider',
            'action' => route('admin.location.providers.update', [
                'location' => $location, 
                'locationProvider' => $locationProvider,
            ]),
            'method' => 'POST',
            
            '_method' => 'PATCH',
        ];

        return view('pages.admin.location-provider.form')->with([
            'location' => $location,
            'locationProvider' => $locationProvider,
            'form' => $form,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location, LocationProvider $locationProvider)
    {
        dd('');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location, LocationProvider $locationProvider)
    {
        //
    }
}
