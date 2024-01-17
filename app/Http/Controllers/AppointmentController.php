<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Http\Requests\Appointment\AppointmentRequest;
use App\Http\Requests\Patient\PatientRequest;
use App\Models\{
    Appointment,
    Location,
    LocationProvider,
    Panel,
    Patient,
    Test,
};
use App\Services\AppointmentService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    /**
     *
     * @param AppointmentService $appointmentService
     */
    public function __construct(
        protected AppointmentService $appointmentService
    ) {}

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
            'locationTests' => Test::pluck('name', 'id'),
            'locationProviders' => LocationProvider::pluck('first_name', 'id'),
            'locationPanels' => Panel::pluck('name', 'id'),
            'genders' => GenderEnum::array(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentRequest $request)
    {
        $patientFields = array_keys((new PatientRequest())->rules());

        // create a new patient
        $patient = new Patient();
        $patient->fill($request->only($patientFields))
            ->save();

        // create an appointment and associate it with recently created patient
        $this->appointmentService
            ->savePatientAppointment(
                $patient->id, 
                $request->except($patientFields)
            );

        return redirect()->route('admin.appointments.index');
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
