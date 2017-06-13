<?php

namespace Budgets\Http\Requests;

use Iluminate\Foundation\Http\FormRequest;


class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required',
            'class' => 'required'  
        ];
    }
}