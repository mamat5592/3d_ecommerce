<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'is_primary' => ['boolean', 'boolean']
        ];
    }

    public function messages()
    {
        return[

        ];
    }
}
