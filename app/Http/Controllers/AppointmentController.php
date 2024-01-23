<?php

namespace App\Http\Controllers;

use App\Enums\{
    GenderEnum,
    InsuranceResponsibleRelationshipEnum,
};
use App\Http\Requests\Appointment\AppointmentRequest;
use App\Http\Requests\Patient\PatientRequest;
use App\Http\Requests\PatientInsurance\PatientInsuranceRequest;
use App\Models\{
    Appointment,
    InsurancePlan,
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
    public function create(Request $request, ?Appointment $appointment = null)
    {
        $step = $request->query('step', 'step1');

        if (! in_array($step, ['step1', 'step2', 'step3',])) {
            abort(404, 'Step is Invalid');
        }

        $data = [];

        $currentAppointment = Appointment::ofCurrentToken()->latest()->first();

        if (! is_null($currentAppointment)) {
            $step = $currentAppointment->step;
        }

        $data = array_merge($data, [
            'locations' => Location::pluck('name', 'id'),
            'genders' => GenderEnum::array(),
            'insurancePlans' => InsurancePlan::pluck('name', 'id'),
            'insuranceResponsibleRelationsips' => InsuranceResponsibleRelationshipEnum::array(),
        ]);

        $location = $currentAppointment->location;

        if ($step == 'step2') {

            $data = array_merge($data, [
                'locationTests' => $location->tests()->pluck('tests.name as name', 'tests.id as id'),
                'locationProviders' => $location->providers()->pluck('location_providers.first_name', 'location_providers.id as id'),
                'locationPanels' => $location->panels()->pluck('panels.name as name', 'panels.id as id'),
            ]);
        }

        $form = [
            'id' => 'create_appointment',
            'name' => 'create_appointment',
            'action' => route('admin.appointments.store', ['step' => $step]),
            'method' => 'POST',
        ];

        return view('pages.admin.appointment.form')->with([
            'form' => $form, 
            'step' => $step ?? 'step1',
            'currentAppointment' => $currentAppointment ?? NULL,
        ])->with(
            $data
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentRequest $request)
    {
        $patientFields = array_keys((new PatientRequest())->rules());

        $step = $request->query('step', 'step1');

        if ($step == 'step1') {
            
            // create a new patient
            $patient = new Patient();
            $patient->fill($request->only($patientFields))
                ->save();
            $patient = $patient->refresh();

            // create an appointment and associate it with recently created patient
            $patientAppointment = $this->appointmentService
                ->savePatientAppointment(
                    $patient->id, 
                    $request->except($patientFields) + ['step' => 'step2',]
                );

            $step = 'step2';

            return redirect()->route('admin.appointments.create', [
                'step' => $step,
                'patient' => $patient,
                'appointment' => $patientAppointment,
                'locationId' => $request->validated('location_id'),
            ]);
        }
        

        return redirect()->route('admin.appointments.index', [
            'step' => $step,
        ]);
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
