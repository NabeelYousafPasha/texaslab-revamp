<?php

namespace App\Http\Requests\Panel;

use App\Models\Panel;
use App\Models\Status;
use App\Models\Test;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PanelRequest extends FormRequest
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
            'price' => ['required', 'numeric',],
            'status_id' => [
                'required', 
                'numeric', 
                Rule::exists(Status::class, 'id')
                    ->where(function (Builder $query) {
                        return $query->where('model', '=', Panel::class);
                    }),
            ],
            'is_renderabble' => ['nullable', /** 'accepted', */],
            'description_html' => ['nullable', 'string', 'max:255',],

            'tests' => ['required', 'array',],
            'tests.*' => ['required', 'numeric', Rule::in(Test::pluck('id')->toArray()),],

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
        return [
            'name' => 'Name',
            'price' => 'Price',
            'status_id' => 'Status',
            'is_renderabble' => 'Show On Homepage',
            'description_html' => 'Description',
            'tests' => 'Tests',

            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
        ];   
    }

    public function prepareForValidation() 
    {
        if ($this->has('is_renderabble')) {
            $this->merge([
                'is_renderabble' => 1,
            ]);
        }
    }
}
