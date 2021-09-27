<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'min:3|max:15',
            'username' => 'min:3|max:15|unique:users,username',
            'email' => 'email|unique:users,email',
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
