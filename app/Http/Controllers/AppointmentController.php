<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Models\{
    Appointment,
    Location,
};
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::with('patient')->get();

        return view('pages.admin.appointment.index')->with([
            'appointments' => $appointments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $form = [
            'id' => 'create_appointment',
            'name' => 'create_appointment',
            'action' => route('admin.appointments.store'),
            'method' => 'POST',
        ];

        return view('pages.admin.appointment.form')->with([
            'form' => $form,
            'locations' => Location::pluck('name', 'id'),
            'locationTests' => collect(),
            'locationProviders' => collect(),
            'locationPanels' => collect(),
        ]);
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
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
