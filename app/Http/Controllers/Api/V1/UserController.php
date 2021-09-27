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
        return User::findOrFail($id)->update($request->all());
    }

    public function destroy($id)
    {
        return User::findOrFail($id)->delete();
    }
}
