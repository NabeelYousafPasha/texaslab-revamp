<?php

namespace App\Services;

use App\Models\Patient;
use App\Models\Appointment;

class AppointmentService
{
    public function __construct(
        protected Patient $patient
    ) {}

    /**
     *
     * @param integer $patientId
     * @param array $data
     * 
     * @return Appointment
     */
    public function savePatientAppointment(int $patientId, array $data): Appointment
    {
        $patientAppointment = new Appointment();

        $patientAppointment->fill([
            'patient_id' => $patientId,
            ...$data
        ])->save();

        return $patientAppointment->refresh();
    }
}