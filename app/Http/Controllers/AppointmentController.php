<?php

namespace App\Http\Controllers;

use App\Enums\{
    GenderEnum,
    InsuranceResponsibleRelationshipEnum,
};
use App\Http\Requests\Appointment\AppointmentRequest;
use App\Http\Requests\Patient\PatientRequest;
use App\Models\{
    Appointment,
    InsurancePlan,
    Location,
    Patient,
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
    public function create(string $step = 'step1')
    {   
        if (! in_array($step, ['step1', 'step2', 'step3',])) {
            abort(404, 'Step is Invalid');
        }

        $data = [];

        $data = array_merge($data, [
            'locations' => Location::pluck('name', 'id'),
            'genders' => GenderEnum::array(),
            'insurancePlans' => InsurancePlan::pluck('name', 'id'),
            'insuranceResponsibleRelationsips' => InsuranceResponsibleRelationshipEnum::array(),
        ]);

        $currentAppointment = Appointment::OfIncompletedStep()
                ->ofCurrentToken()
                ->byAuthUser()
                ->latest()
                ->first();

        if (! is_null($currentAppointment)) {
            $appointmentLocation = $currentAppointment->location;
            $appointmentPatient = $currentAppointment->patient;

            if ($step == 'step2') {

                $data = array_merge($data, [
                    'locationTests' => $appointmentLocation->tests()->pluck('tests.name as name', 'tests.id as id'),
                    'locationProviders' => $appointmentLocation->providers()->pluck('location_providers.first_name', 'location_providers.id as id'),
                    'locationPanels' => $appointmentLocation->panels()->pluck('panels.name as name', 'panels.id as id'),

                    'appointmentTests' => $currentAppointment->tests()->pluck('test_id')->toArray(),
                    'appointmentlocationProviders' => $currentAppointment->location_providers()->pluck('location_provider_id')->toArray(),
                    'appointmentPanels' => $currentAppointment->panels()->pluck('panel_id')->toArray(),
                ]);
            }
    
            if ($step == 'step3') {

                $data = array_merge($data, [
                    'patientInsurances' => $appointmentPatient->insurances,
                ]);

            }
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
            'appointment' => $currentAppointment ?? NULL,
            'patient' => $appointmentPatient ?? NULL,
        ])->with(
            $data
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentRequest $request, string $step = 'step1')  
    {
        $patientFields = array_keys((new PatientRequest())->rules());

        $currentAppointment = Appointment::OfIncompletedStep()
                ->ofCurrentToken()
                ->byAuthUser()
                ->latest()
                ->first();

        if ($step == 'step1') {
            
            // create a new patient
            $patient = new Patient();
            $patient->fill($request->only($patientFields))
                ->save();
            $patient = $patient->refresh();

            $step = 'step2';

            // create an appointment and associate it with recently created patient
            $patientAppointment = $this->appointmentService
                ->savePatientAppointment(
                    $patient->id, 
                    $request->except($patientFields) + ['step' => $step,]
                );

            // update patient created via event
            $patient->update([
                'model_type' => Appointment::class,
                'model_id' => $patientAppointment->id,
            ]);

            return redirect()->route('admin.appointments.create', [
                'step' => $step,
                'appointment' => $patientAppointment,
            ]);
        }

        if (! is_null($currentAppointment)) {

            if ($step == 'step2') {

                // associate tests with $currentAppointment
                $currentAppointment->tests()->sync($request->validated('tests'));

                // associate providers with $currentAppointment
                $currentAppointment->location_providers()->sync($request->validated('providers'));
                
                // associate panels with $currentAppointment
                $currentAppointment->panels()->sync($request->validated('panels'));
                
                $step = 'step3';

                $currentAppointment->update([
                    'step' => $step,
                ]);

                return redirect()->route('admin.appointments.create', [
                    'step' => $step,
                ]);
            }

            if ($step == 'step3') {

                $currentAppointment->update([
                    'step' => NULL,
                ]);
            }
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
