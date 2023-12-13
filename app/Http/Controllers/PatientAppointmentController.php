<?php

namespace App\Http\Controllers;

use App\Models\PatientAppointment;
use App\Models\Patient;
use App\Services\PatientAppointmentService;
use Illuminate\Http\Request;

class PatientAppointmentController extends Controller
{
    protected PatientAppointmentService $patientAppointmentService;

    public function __construct(
        PatientAppointmentService $patientAppointmentService
    )
    {
        $this->patientAppointmentService = $patientAppointmentService;
    }

    public function store(Request $request)
    {
        $patient = new Patient();
        $patient->fill($request->all())->save();

        $patientAppointment = $this->patientAppointmentService
            ->savePatientAppointment($request->all());

        // @todo - need to separate redirects() and response()
        return response(['success' => 'Appointment created successfully.']);
    }
}