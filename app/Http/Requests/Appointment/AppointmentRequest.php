<?php

namespace App\Http\Requests\Appointment;

use App\Http\Requests\Patient\PatientRequest;
use App\Models\{
    Appointment,
    Location,
    LocationProvider,
    Panel,
    Patient,
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
        $step = $this->route('step', 'step1');

        if (! in_array($step, ['step1', 'step2', 'step3',])) {
            abort(404, 'Step is Invalid');
        }

        $patientRequest = (new PatientRequest())->rules();

        if ($currentAppointmentPatient = Appointment::OfIncompletedStep()
        ->ofCurrentToken()
        ->byAuthUser()
        ->latest()
        ->first()?->patient) {

            // update patient email validation rules, to ignore uniique email for current patient
            $patientRequest['email'] = [
                'required', 
                'string', 
                'max:255', 
                'email', 
                Rule::unique(Patient::class, 'email')
                    ->ignore($currentAppointmentPatient->id, 'id'),
            ];
        }
        
        $rules = [
            'step1' => [
                'location_id' => ['required', 'numeric', Rule::exists(Location::class, 'id'),],
                'appointment_date' => ['required', 'date_format:Y-m-d',],
                'appointment_time' => ['required', 'date_format:H:i'],

                ...$patientRequest
            ] + [
                
            ],

            'step2' => [
                'tests' => ['required', 'array',],
                'tests.*' => ['required', 'numeric', Rule::in(Test::pluck('id')->toArray()),],

                'providers' => ['required', 'array',],
                'providers.*' => ['required', 'numeric', Rule::in(LocationProvider::pluck('id')->toArray()),],

                'panels' => ['required', 'array',],
                'panels.*' => ['required', 'numeric', Rule::in(Panel::pluck('id')->toArray()),],
            ],

            'step3' => [
                //
            ],
        ];

        return $rules[$step];
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
        
            ...(new PatientRequest())->attributes(),
        ];
    }

    public function prepareForValidation() 
    {    
        $this->merge([
            'token' => csrf_token(),
            'created_by' => auth()->id(),
        ]);
    }
}
