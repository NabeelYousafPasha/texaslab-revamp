<?php

namespace App\Http\Controllers;

use App\Enums\InsuranceResponsibleRelationshipEnum;
use App\Http\Requests\PatientInsurance\PatientInsuranceRequest;
use App\Models\{
    InsurancePlan,
    Patient,
    PatientInsurance,
};
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PatientInsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Patient $patient)
    {
        return view('pages.admin.insurance.index')->with([
            'patient' => $patient,
            'patientInsurances' => $patient->insurances,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Patient $patient)
    {
        $form = [
            'id' => 'create__patient_insurance',
            'name' => 'create__patient_insurance',
            'action' => route('admin.patient.insurances.store', ['patient' => $patient,]),
            'method' => 'POST',
        ];

        return view('pages.admin.insurance.form')->with([
            'patient' => $patient,
            'form' => $form,
            'insurancePlans' => InsurancePlan::pluck('name', 'id'),
            'insuranceResponsibleRelationsips' => InsuranceResponsibleRelationshipEnum::array(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientInsuranceRequest $request, Patient $patient)
    {
        // create patient insurances
        $patientInsurance = PatientInsurance::create(Arr::except($request->validated(), 'insurance_plans') + [
            'patient_id' => $patient->id,
        ]);

        // assign selected insurance_plans
        $patientInsurance->insurance_plans()->attach($request->validated('insurance_plans'));

        return redirect()->route('admin.patient.insurances.index', ['patient' => $patient,]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientInsurance $patientInsurance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientInsurance $patientInsurance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PatientInsurance $patientInsurance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientInsurance $patientInsurance)
    {
        //
    }
}
