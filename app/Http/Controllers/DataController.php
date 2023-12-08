<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientAppointment;
use App\Models\Patient;

class DataController extends Controller
{
    public function patientAppointment()
    {
        $appointments = PatientAppointment::with('patient')->get();
        return view('admin-views.patientappointment', compact('appointments'));
    }

    public function patientAppointmentData(Request $request)
    {
        // Your logic to fetch data goes here
        $appointments = PatientAppointment::all();
        return response()->json([
            "appointments" => $appointments,
        ]);

    }

}