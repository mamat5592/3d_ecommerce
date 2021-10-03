<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:skills,name', 'max:15'],
        ];
    }

    public function messages()
    {
        return [];
    }
}
