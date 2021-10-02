<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'three_d_model_id' => ['required', 'integer', 'exists:three_d_models,id'],
            'name' => ['required', 'string', 'unique:files,name']
        ];
    }

    public function messages()
    {
        return[

        ];
    }
}
