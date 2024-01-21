<?php

namespace App\Http\Requests\Appointment;

use App\Http\Requests\Patient\PatientRequest;
use App\Models\{
    Location,
    LocationProvider,
    Panel,
    Test,
};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AppointmentRequest extends FormRequest
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
            'location_id' => ['required', 'numeric', Rule::exists(Location::class, 'id'),],
            
            'tests' => ['required', 'array',],
            'tests.*' => ['required', 'numeric', Rule::in(Test::pluck('id')->toArray()),],

            // 'providers' => ['required', 'array',],
            // 'providers.*' => ['required', 'numeric', Rule::in(LocationProvider::pluck('id')->toArray()),],

            'panels' => ['required', 'array',],
            'panels.*' => ['required', 'numeric', Rule::in(Panel::pluck('id')->toArray()),],

            'appointment_date' => ['required', 'date_format:Y-m-d',],
            'appointment_time' => ['required', 'date_format:H:i'],
        ];
        // + (new PatientRequest())->rules();
    }

    /**
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'location_id' => 'Location',
            'tests' => 'Tests',
            'providers' => 'Providers',
            'panels' => 'Panels',
            'appointment_date' => 'Appointment Date',
            'appointment_time' => 'Appointment Time',
        
        ];
        // + (new PatientRequest())->attributes();
    }
}
