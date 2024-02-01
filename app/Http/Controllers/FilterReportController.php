<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterReportController extends Controller
{
    public function appointmentView(Request $request) 
    {
        return view('pages.reports.appointment.view');
    }

    public function appointmentDownload(Request $request) 
    {
        dd($request->method());
    }
}
