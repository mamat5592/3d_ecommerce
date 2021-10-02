<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'three_d_model_id' => ['required', 'integer', 'exists:three_d_models,id']
        ];
    }

    public function messages()
    {
        return [];
    }
}
