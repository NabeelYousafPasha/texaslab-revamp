<?php

namespace App\Http\Controllers;

use App\Enums\{
    AppointmentPaymentViaEnum,
    GenderEnum,
    InsuranceResponsibleRelationshipEnum,
};
use App\Http\Requests\Appointment\AppointmentRequest;
use App\Http\Requests\Patient\PatientRequest;
use App\Models\{
    Appointment,
    IcdCode,
    InsurancePlan,
    Location,
    Patient,
    Test,
};
use App\Services\AppointmentService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $appointments = Appointment::query();
        
        $appointments->whereHas('patient');

        $appointments->with('patient');

        return view('pages.admin.appointment.index')->with([
            'appointments' => $appointments->get(),

            'locations' => Location::pluck('name', 'id'),
            'tests' => Test::pluck('name', 'id'),
            'columns' => config('custom.appointment.REPORT_COLLUMNS'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, string $step = 'step1')
    {   
        // step must be valid
        if (! in_array($step, ['step1', 'step2', 'step3',])) {
            abort(Response::HTTP_NOT_FOUND, 'Step is Invalid');
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

        // step1 must be filled
        if (is_null($currentAppointment) && in_array($step, ['step2', 'step3'])) {
            
            return abort(Response::HTTP_NOT_FOUND, 'Step is Invalid');

        }

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
                    'appointmentPaymentVia' => AppointmentPaymentViaEnum::array(),
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
            
            if (! is_null($currentAppointment)) {

                // update existing patient
                $patient = Patient::find($currentAppointment->patient_id);
            }

            $patient->fill($request->only($patientFields))
                ->save();
            $patient = $patient->refresh();

            // update step
            $step = 'step2';

            // create an appointment and associate it with recently created patient
            $patientAppointment = (is_null($currentAppointment)) 
                ? $this->appointmentService->createPatientAppointment(
                    $patient->id, 
                    $request->except($patientFields) + ['step' => $step,]
                )
                : $this->appointmentService->updatePatientAppointment(
                    $currentAppointment,
                    $patient->id, 
                    $request->except($patientFields) + ['step' => $step,]
                );

            // only one time event    
            if (is_null($currentAppointment)) {

                // update patient created via event
                $patient->update([
                    'model_type' => Appointment::class,
                    'model_id' => $patientAppointment->id,
                ]);
            }

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
                    'payment_via' => $request->validated('payment_via'),
                    'step' => NULL,
                ]);

                // if ($request->validated('payment_via') == AppointmentPaymentViaEnum::INSURANCE) {
                    $currentAppointment
                        ->patient
                        ->insurances()
                        ->create(array_merge($request->validated(), [
                            'model_type' => Appointment::class,
                            'model_id' => $currentAppointment->id,
                        ]));
                // }
            }
        }

        return redirect()->route('admin.appointments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        dd($appointment);
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

    public function filter(Request $request) 
    {
        $appointments = Appointment::query();

        $appointments->ofCompletedStep();

        if ($request->filled('id')) {
            $appointments->where('id', '=', $request->get('id'));
        }

        if ($request->filled('from')) {
            $appointments->whereDate('appointment_date', '>=', $request->get('from'));
        }

        if ($request->filled('to')) {
            $appointments->whereDate('appointment_date', '<=', $request->get('to'));
        }

        $appointments->whereHas('patient', function (Builder $query) use ($request) {
            
            if ($request->filled('first_name')) {
                $query->where('first_name', 'LIKE', $request->get('first_name').'%');
            }

            if ($request->filled('last_name')) {
                $query->where('last_name', 'LIKE', $request->get('last_name').'%');
            }

            if ($request->filled('dob')) {
                $query->whereDate('dob', '=', $request->get('dob'));
            }

            return $query;
        });

        if ($request->filled('locations')) {

            $appointments->whereIn('appointments.location_id', $request->get('locations'));
        }

        $appointments->whereHas('tests', function (Builder $query) use ($request) {
        
            if ($request->filled('test')) {
                $query->where('tests.id', '=', $request->get('test'));

                return $query;
            }
        });
        
        $appointments->with([
            'patient',
            'tests',
        ]);

        return view('pages.admin.appointment.index')->with([
            'appointments' => $appointments->get(),

            'locations' => Location::pluck('name', 'id'),
            'tests' => Test::pluck('name', 'id'),

            'columns' => config('custom.appointment.REPORT_COLLUMNS'),
            'filters' => [
                'id' => $request->get('id'),
                'from' => $request->get('from'),
                'to' => $request->get('to'),
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'dob' => $request->get('dob'),
                'locations' => $request->get('locations'),
                'test' => $request->get('test'),
            ],
        ]);
    }

    public function requisition(Appointment $appointment) 
    {
        abort_if(! is_null($appointment->step), Response::HTTP_NOT_FOUND, 'Step(s) Not Completed');

        return view('pages.admin.appointment.requisition')->with([
            'appointment' => $appointment,
            'appointmentLocation' => $appointment->location,
            'appointmentPatient' => $appointment->patient,
            'appointmentLocationProvider' => $appointment->location_providers()->first(),
            'appointmentTests' => $appointment->tests,
            'testReferenceOptions' => [
                'in-house' => 'In House',
                'reference-lab' => 'Reference Lab',
            ],
        ]);
    }


    public function requisitionPrint(Appointment $appointment) 
    {
        abort_if(! is_null($appointment->step), Response::HTTP_NOT_FOUND, 'Step(s) Not Completed');

        $logo = asset('/storage/logos/lab-img.png');
        $img = file_get_contents(public_path('storage/logos/lab-img.png'));
        $base64Logo = 'data:image/'.pathinfo($logo, PATHINFO_EXTENSION).';base64,'.base64_encode($img);

        $icdCodes = IcdCode::whereIn('id', $appointment->tests->pluck('id'))->pluck('code', 'id');

        $data = [
            'appointment' => $appointment,
            'location' => $appointment->location,
            'patient' => $appointment->patient,
            'appointmentLocationProvider' => $appointment->location_providers()->first(),
            'appointmentTests' => $appointment->tests,
            
            'testReferenceOptions' => [
                'in-house' => 'In House',
                'reference-lab' => 'Reference Lab',
            ],
            'genders' => GenderEnum::array(),
            'labLogo' => $base64Logo,
            'icdCodesString' => implode(',', $icdCodes->toArray()),
        ];

        // dd($data);

        // return view('pdf.appointment.requisition', $data);

        $pdf = Pdf::setOptions([
            'logOutputFile' => null, 
            'isHtml5ParserEnabled' => true, 
            'isRemoteEnabled' => true,
        ])
        ->loadView('pdf.appointment.requisition', $data);

        return $pdf->stream();
    }
}
