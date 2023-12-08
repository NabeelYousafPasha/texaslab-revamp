<?php

namespace App\Http\Controllers;

use App\Models\PatientAppointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function storeAppointment(Request $request)
    {
        $patient = new Patient;
        $patient->first_name = $request->firstName;
        $patient->last_name = $request->last_name;
        $patient->full_name = $request->first_name . '' . $request->last_name;
        $patient->email_address = $request->email;
        $patient->gender = $request->gender;
        $patient->dob = $request->dob;
        $patient->cell_phone = $request->phoneNumber;
        $patient->address = $request->address;
        $patient->city = $request->city;
        $patient->state = $request->state;
        $patient->zipcode = $request->zip;
        $patient->save();
        $appointment = new PatientAppointment;
        $appointment->patient_id = $patient->id;
        $appointment->save();

        return response(['success' => 'Appointment created successfully.']);
    }
}