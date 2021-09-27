<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreeDModelStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:20',
            'description' => 'required|min:20|max:150',
            'specification' => 'required|min:20|max:150',
            'price' => 'required|between:0,9999999.99',
        ];
    }

    public function messages()
    {
        return[

        ];
    }
}
