<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookmarkUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => ['integer', 'exists:users,id'],
            'three_d_model_id' => ['integer', 'exists:three_d_models,id']
        ];
    }

    public function messages()
    {
        return [];
    }
}
