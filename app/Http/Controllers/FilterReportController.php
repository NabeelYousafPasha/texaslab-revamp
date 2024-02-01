<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterReportController extends Controller
{
    public function appointmentView(Request $request) 
    {
        $columns = config('custom.appointment.REPORT_COLLUMNS');

        return view('pages.reports.appointment.view')->with([
            'columns' => $columns,
        ]);
    }

    public function appointmentDownload(Request $request) 
    {
        dd($request->method());
    }
}
