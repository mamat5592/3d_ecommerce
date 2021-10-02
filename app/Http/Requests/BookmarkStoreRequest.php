<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookmarkStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'three_d_model_id' => ['required', 'integer', 'exists:three_d_models,id']
        ];
    }

    public function messages()
    {
        return [];
    }
}
