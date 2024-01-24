<?php

namespace App\Http\Requests\LocationProvider;

use App\Models\LocationProvider;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LocationProviderRequest extends FormRequest
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
            'npi' => ['required', 'string', 'max:255', Rule::unique(LocationProvider::class, 'npi'),],
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
            'last_name' => 'First Name',
            'npi' => 'NPI (National Provider Identifier)',
        ];   
    }

    public function prepareForValidation() 
    {
        $this->merge([
            'location_id' => $this->route('location'),
        ]);
    }
}
