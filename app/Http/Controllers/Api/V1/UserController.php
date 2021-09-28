<?php

namespace App\http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::paginate(4));
    }

    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if(auth()->user()->cannot('update', $user)){
            // abort(403);
            return response(['message' => 'not authorized'], 403);
        }
        
        return $user->update($request->validated());
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if(auth()->user()->cannot('delete', $user)){
            // abort(403);
            return response(['message' => 'not authorized'], 403);
        }

        return $user->delete();
    }
}
