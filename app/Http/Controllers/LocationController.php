<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LocationService;
use App\Http\Requests\Location\LocationRequest;
use App\Models\{
    Location,
    Test,
    Panel,
};

class LocationController extends Controller
{
    protected $locationService;

    /**
     *
     * @param LocationService $locationService
     */
    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();

        return view('pages.admin.location.index')->with([
            'locations' => $locations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tests = Test::pluck('name', 'id');
        $panels = Panel::pluck('name', 'id');
        
        $form = [
            'id' => 'create_location',
            'name' => 'create_location',
            'action' => route('admin.locations.store'),
            'method' => 'POST',
        ];

        return view('pages.admin.location.form')->with([
            'tests' => $tests,
            'panels' => $panels,
            'form' => $form,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        // Store basic location details
        $location = $this->locationService->storeLocation([
            'name' => $request->validated('name'),
            'phone' => $request->validated('phone'),
            'clia' => $request->validated('clia'),
            'sales_rep_code' => $request->validated('sales_rep_code'),
            'address' => $request->validated('address'),
            'city' => $request->validated('city'),
            'state' => $request->validated('state'),
            'zipcode' => $request->validated('zipcode'),
            'status' => $request->boolean('status'),
        ]);

        $timingData = $request->only([
            'start_time',
            'end_time',
            'block_start_time',
            'block_end_time',
            'time_interval',
            'block_limit',
        ]);
        $this->locationService->storeLocationTiming($timingData, $location->id);

        // Store location day timing
        $dayTimingData = $request->only([
            'monday_status',
            'tuesday_status',
            'wednesday_status',
            'thursday_status',
            'friday_status',
            'saturday_status',
            'sunday_status',
            'start_time',
            'end_time',
            'monday-start-time',
            'monday-end-time',
            'tuesday-start-time',
            'tuesday-end-time',
            'wednesday-start-time',
            'wednesday-end-time',
            'thursday-start-time',
            'thursday-end-time',
            'friday-start-time',
            'friday-end-time',
            'saturday-start-time',
            'saturday-end-time',
            'sunday-start-time',
            'sunday-end-time',
        ]);
        $this->locationService->storeLocationDayTiming($dayTimingData, $location->id);

        if ($request->filled('terms_and_conditions')) {
            // Store location terms
            $this->locationService->storeLocationTerms($request->only('terms_and_conditions'), $location->id);
        }

        // Store location tests
        $this->locationService->storeLocationTests($request->input('tests'), $location->id);

        if ($request->filled('panels') && is_array($request->input('panels'))) {
            // Store location panels
            // $this->locationService->storeLocationPanels($request->input('panels'), $location->id);
        }

        return redirect()->route('admin.locations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        $tests = Test::pluck('name', 'id');
        $panels = Panel::pluck('name', 'id');
        $locationData = Location::with('dayTimings', 'locationTests', 'panels', 'locationTiming')
                ->where('id', '=', $location->id)
                ->first();
        $form = [
            'id' => 'edit_location',
            'name' => 'edit_location',
            'action' => route('admin.locations.update', $location->id),
            'method' => 'POST',
            '_method' => 'PATCH',
        ];

        return view('pages.admin.location.form')->with([
            'tests' => $tests,
            'panels' => $panels,
            'form' => $form,
            'locationData' => $locationData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, Location $location)
    {
        $this->locationService->updateLocation($location, [
            'name' => $request->validated('name'),
            'phone' => $request->validated('phone'),
            'clia' => $request->validated('clia'),
            'sales_rep_code' => $request->validated('sales_rep_code'),
            'address' => $request->validated('address'),
            'city' => $request->validated('city'),
            'state' => $request->validated('state'),
            'zipcode' => $request->validated('zipcode'),
            'status' => $request->boolean('status'),
        ]);

        $timingData = $request->only([
            'start_time',
            'end_time',
            'block_start_time',
            'block_end_time',
            'time_interval',
            'block_limit',
        ]);
        $this->locationService->storeLocationTiming($timingData, $location->id);

        // Update location day timing
        $dayTimingData = $request->only([
            'monday_status',
            'tuesday_status',
            'wednesday_status',
            'thursday_status',
            'friday_status',
            'saturday_status',
            'sunday_status',
            'start_time',
            'end_time',
            'monday-start-time',
            'monday-end-time',
            'tuesday-start-time',
            'tuesday-end-time',
            'wednesday-start-time',
            'wednesday-end-time',
            'thursday-start-time',
            'thursday-end-time',
            'friday-start-time',
            'friday-end-time',
            'saturday-start-time',
            'saturday-end-time',
            'sunday-start-time',
            'sunday-end-time',
        ]);
        $this->locationService->storeLocationDayTiming($dayTimingData, $location->id);

        if ($request->filled('terms_and_conditions')) {
            // Update location terms
            $this->locationService->storeLocationTerms($request->only('terms_and_conditions'), $location->id);
        }

        // Update location tests
        $this->locationService->updateLocationTests($request->input('tests'), $location->id);

        if ($request->filled('panels') && is_array($request->input('panels'))) {
            // Update location panels
            $this->locationService->storeLocationPanels($request->input('panels'), $location->id);
        }

        return redirect()->route('admin.locations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        $location->dayTimings()->delete();

        return redirect()->route('admin.locations.index')
                ->withSuccess(__('Location delete successfully.'));
    }
}
