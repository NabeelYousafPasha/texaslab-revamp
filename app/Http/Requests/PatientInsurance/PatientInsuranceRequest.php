<?php

namespace App\Http\Requests\PatientInsurance;

use App\Models\InsurancePlan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientInsuranceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255',],
            'address' => ['required', 'string', 'max:255',],
            'city' => ['required', 'string', 'max:255',],
            'state' => ['required', 'string', 'max:255',],
            'zipcode' => ['required', 'string', 'max:255',],

            'employer_no' => ['required', 'string', 'max:255',],
            'ssn' => ['nullable', 'string', 'max:255',],
            'is_worker_compensated' => ['nullable', 'boolean',],

            'insurance_plans' => ['required', 'array',],
            'insurance_plans.*' => ['required', 'string', Rule::in(InsurancePlan::pluck('id')->toArray()),],
        ];
    }

    /**
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'employer_no' => 'Employer No',
            'ssn' => 'Social Security number (SSN)',
            'is_worker_compensated' => 'Worker Compensation',
            'insurance_plans' => 'Insurance Plans',
        ];   
    }
}
