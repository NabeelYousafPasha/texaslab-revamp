<?php

namespace App\Services;

use App\Models\Patient;
use App\Models\PatientAppointment;

class PatientAppointmentService
{
    protected Patient $patient;

    public function __construct(Patient $patient)
    {
        $this->patient = $patient;
    }

    public function savePatientAppointment($data)
    {
        $patientAppointment = new PatientAppointment();
        $patientAppointment->fill([
            'patient_id' => $this->patient->id,
            ...$data
        ]);
        $patientAppointment->save();

        return $patientAppointment->refresh();
    }
}