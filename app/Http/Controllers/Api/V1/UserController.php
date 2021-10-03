<?php

namespace App\http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->cannot('viewAny')) {
            return response(['message' => 'not authorized'], 403);
        }

        return new UserCollection(User::paginate(10));
    }

    public function store(UserStoreRequest $request)
    {
        if ($request->user()->cannot('create')) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return User::create($validated);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        if (auth()->user()->cannot('view', $user)) {
            return response(['message' => 'not authorized'], 403);
        }

        return new UserResource($user);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->user()->cannot('update', $user)) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return $user->update($validated);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (auth()->user()->cannot('delete', $user)) {
            return response(['message' => 'not authorized'], 403);
        }

        return $user->delete();
    }
}
