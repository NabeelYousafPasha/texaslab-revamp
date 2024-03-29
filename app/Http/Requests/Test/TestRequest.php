<?php

namespace App\Http\Requests\Test;

use App\Models\{
    IcdCode,
    ResultKpi, 
    Status, 
    Test,
};
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;

class TestRequest extends FormRequest
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
            'is_free' => ['required', 'boolean',],
            'actual_price' => ['required', 'numeric',],
            'offered_price' => ['required', 'numeric',],
            'competitor_price' => ['required', 'numeric',],
            'status_id' => [
                'required', 
                'numeric', 
                Rule::exists(Status::class, 'id')
                    ->where(function (Builder $query) {
                        return $query->where('model', '=', Test::class);
                    }),
            ],
            'featured_at' => ['nullable', /** 'accepted', */],
            'is_renderabble' => ['nullable', /** 'accepted', */],
            'description_html' => ['nullable', 'string', 'max:255',],

            // 'test_result_kpis' => ['required', 'array', /** Rule::in(ResultKpi::ofTest()->pluck('id')->toArray()), */],
            // 'test_result_kpis.*' => ['required', 'string',],

            'icd_codes' => ['required', 'array', Rule::in(IcdCode::pluck('id')->toArray())],

            'specimen' => ['required', 'string', 'max:255',],
            'labdaq_compendium' => ['required', 'string', 'max:255',],
            'labdaq_panel_name' => ['required', 'string', 'max:255',],
            
            'meta_title' => ['nullable', 'string', 'max:255',],
            'meta_description' => ['nullable', 'string', 'max:255',],
        ];
    }

    /**
     *
     * @return array
     */
    public function attributes(): array
    {
        // $resultKpis = ResultKpi::ofTest()->pluck('name', 'id')->toArray();
        // $resultKpisFields = Arr::prependKeysWith($resultKpis, 'test_result_kpis.');

        return [
            'name' => 'Name',
            'is_free' => 'Price',
            'actual_price' => 'Actual Price',
            'offered_price' => 'Offered Price',
            'competitor_price' => 'Competitor Price',
            'status_id' => 'Status',
            'featured_at' => 'Featured',
            'is_renderabble' => 'Show On Homepage',
            'description_html' => 'Description',

            // 'test_result_kpis' => 'Result Kpis',
            // ...$resultKpisFields,

            'icd_codes' => 'ICD Codes',

            'specimen' => 'specimen',
            'labdaq_compendium' => 'Labdaq Compendium',
            'labdaq_panel_name' => 'Labdaq Panel Name',
            
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
        ];   
    }

    public function prepareForValidation() 
    {
        if ($this->has('featured_at')) {
            $this->merge([
                'featured_at' => now(),
            ]);
        }

        if ($this->has('is_renderabble')) {
            $this->merge([
                'is_renderabble' => 1,
            ]);
        }

        if ($this->filled('is_free') && $this->boolean('is_free') == TRUE) {
            $this->merge([
                'actual_price' => 0,
                'offered_price' => 0,
                'competitor_price' => 0,
            ]);
        }
    }
}
