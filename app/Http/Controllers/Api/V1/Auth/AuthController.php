<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(UserStoreRequest $request)
    {
        $request = $request->all();
        $request['password'] = bcrypt($request['password']);

        User::create($request);

        return response(['message' => "everything is ok! you'r registered, please login by /api/v1/login"]);
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
