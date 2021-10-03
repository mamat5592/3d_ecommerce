<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['string', 'unique:tags,name', 'max:15'],
        ];
    }

    public function messages()
    {
        return [];
    }
}
