<?php

namespace Budgets\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertPlannedValueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ene' => 'numeric|min:0',
            'feb' => 'numeric|min:0',
            'mar' => 'numeric|min:0',
            'abr' => 'numeric|min:0',
            'may' => 'numeric|min:0',
            'jun' => 'numeric|min:0',
            'jul' => 'numeric|min:0',
            'ago' => 'numeric|min:0',
            'sep' => 'numeric|min:0',
            'oct' => 'numeric|min:0',
            'nov' => 'numeric|min:0',
            'dic' => 'numeric|min:0'
        ];
    }
}
