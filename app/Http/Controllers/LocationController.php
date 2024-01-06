<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LocationService;
use App\Http\Requests\Location\LocationRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Models\{
    LocationDetail,
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
        $locations = LocationDetail::where('status', '1')->get();

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
        // Validate the request
        $data = $request->validated();

        // Store basic location details
        $location = $this->locationService->storeLocation($data);

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

        // Store location terms
        $termsData = $request->only([
            'terms_and_conditions',
        ]);
        $this->locationService->storeLocationTerms($termsData, $location->id);

        // Store location tests
        $locationTests = $request->only([
            'tests',
        ]);
        $this->locationService->storeLocationTests($locationTests, $location->id);

        // Store location panels
        $locationPanels = $request->only([
            'panels',
        ]);
        $this->locationService->storeLocationPanels($locationPanels, $location->id);

        return redirect()->route('admin.locations.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(LocationDetail $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LocationDetail $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LocationDetail $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LocationDetail $location)
    {
        $location->delete();
        $location->dayTimings()->delete();
        return redirect()->route('admin.locations.index')
            ->withSuccess(__('Location delete successfully.'));
    }
}
