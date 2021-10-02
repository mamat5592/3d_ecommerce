<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['string', 'unique:roles,name', 'max:15'],
            'description' => ['nullable', 'string', 'min:5']
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
