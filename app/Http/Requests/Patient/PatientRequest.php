<?php

namespace App\Http\Requests\Patient;

use App\Enums\GenderEnum;
use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255',],
            'last_name' => ['required', 'string', 'max:255',],
            'email' => ['required', 'string', 'max:255', 'email', Rule::unique(Patient::class, 'email'),],
            'gender' => ['required', 'string', Rule::in(GenderEnum::values()),],
            'dob' => ['required', 'string', 'date_format:Y-m-d',],
            'cell_phone' => ['required', 'string', 'max:255',],
            'address' => ['required', 'string', 'max:255',],
            'city' => ['required', 'string', 'max:255',],
            'state' => ['required', 'string', 'max:255',],
            'zipcode' => ['required', 'string', 'max:255',],
        ];
    }

    /**
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email Address',
            'gender' => 'Gender',
            'dob' => 'DOB',
            'cell_phone' => 'Cell Phone',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
        ];   
    }
}
