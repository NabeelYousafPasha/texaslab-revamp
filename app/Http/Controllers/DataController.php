<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientAppointment;
use App\Models\Patient;

class DataController extends Controller
{
    // @todo need to rename class
    public function patientAppointment()
    {
        $appointments = PatientAppointment::with('patient')->get();
        return view('admin-views.patientappointment', compact('appointments'));
    }

    // @todo need to separate JSON response as API V1 structure
    public function patientAppointmentData(Request $request)
    {
        // Your logic to fetch data goes here
        $appointments = PatientAppointment::all();
        return response()->json([
            "appointments" => $appointments,
        ]);

    }

}