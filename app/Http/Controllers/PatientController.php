<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Http\Requests\Patient\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::query()
            ->get();

        return view('pages.admin.patient.index')->with([
            'patients' => $patients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $form = [
            'id' => 'create_patient',
            'name' => 'create_patient',
            'action' => route('admin.patients.store'),
            'method' => 'POST',
        ];

        return view('pages.admin.patient.form')->with([
            'form' => $form,
            'genders' => GenderEnum::array(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        $patient = new Patient();
        $patient->fill($request->validated())
            ->save();

        return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
