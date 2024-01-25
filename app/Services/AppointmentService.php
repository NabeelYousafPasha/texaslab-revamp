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
     * @param array $appoiintmentData
     * 
     * @return Appointment
     */
    public function createPatientAppointment(int $patientId, array $appoiintmentData): Appointment
    {
        $patientAppointment = new Appointment();

        $patientAppointment->fill([
            'patient_id' => $patientId,
            ...$appoiintmentData
        ])->save();

        return $patientAppointment->refresh();
    }

    /**
     *
     * @param Appointment $appointment
     * @param integer $patientId
     * @param array $appoiintmentData
     * 
     * @return Appointment
     */
    public function updatePatientAppointment(Appointment $appointment, int $patientId, array $appoiintmentData): Appointment
    {
        $appointment->fill([
            'patient_id' => $patientId,
            ...$appoiintmentData
        ])->save();

        return $appointment->refresh();
    }
}