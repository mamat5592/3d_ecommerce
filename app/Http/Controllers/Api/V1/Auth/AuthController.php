<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:15',
            'username' => 'required|min:3|max:15|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:15',
            'avatar' => 'url',
            'bio' => 'string',
            'is_newsletter_on' => 'boolean',
            'is_notification_on' => 'boolean'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return response(['message' => "everything is ok! you'r registered, please login by api/v1/login"]);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $attr = [
            $fieldType => $validated['username'],
            'password' => $validated['password']
        ];

        if (!Auth::attempt($attr)) {
            return response(['message' => 'authentication faild!'], 401);
        }

        if(auth()->user()->tokens()->count() >= 1){
            return response(['message' => "you'r already logged in!"], 401);
        }

        return response(['token' => auth()->user()->createToken('blah blah')->plainTextToken]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response(['message' => 'token revoked!']);
    }

    public function newToken()
    {
        auth()->user()->tokens()->delete();

        return response(['token' => auth()->user()->createToken('blah blah')->plainTextToken]);
    }
}
