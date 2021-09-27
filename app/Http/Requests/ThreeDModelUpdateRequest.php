<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreeDModelUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|min:3|max:20',
            'description' => 'min:20|max:150',
            'specification' => 'min:20|max:150',
            'view' => 'integer',
            'download' => 'integer',
            'price' => 'between:0,9999999.99',
            'like' => 'integer'
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
