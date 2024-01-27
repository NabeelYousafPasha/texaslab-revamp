<?php

namespace App\Http\Requests\Location;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\{
    Panel,
    Test,
};


class LocationRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'clia' => ['required', 'string', 'max:255'],
            'sales_rep_code' => ['required', 'string', 'max:255'],

            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:10',
            'status' => 'required|boolean',
            
            'tests' => ['required', 'array',],
            'tests.*' => ['required', 'numeric', Rule::in(Test::pluck('id')->toArray()),],

            'panels' => ['nullable', 'array',],
            'panels.*' => ['nullable', 'numeric', Rule::in(Panel::pluck('id')->toArray()),],
        ];
    }
}
