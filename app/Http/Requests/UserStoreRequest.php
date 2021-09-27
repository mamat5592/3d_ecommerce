<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:15',
            'username' => 'required|min:3|max:15|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:15',
            'avatar' => 'url',
            'bio' => 'string',
            'is_newsletter_on' => 'boolean',
            'is_notification_on' => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
