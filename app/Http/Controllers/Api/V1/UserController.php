<?php

namespace App\http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
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

    public function add_role(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'role_id' => ['required', 'integer', 'numeric', 'exists:roles,id']
        ]);

        if ($request->user()->cannot('add_role', $user)) {
            return response(['message' => 'not authorized'], 403);
        }

        $user->roles()->attach($validated['role_id']);

        return response(['message' => 'role added to user seccessfully.'], 200);
    }

    public function remove_role(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'role_id' => ['required', 'integer', 'numeric', 'exists:roles,id']
        ]);

        if(!$user->roles->contains($validated['role_id'])){
            return response(['message' => 'user has not that role'], 403);
        }

        if ($request->user()->cannot('remove_role', $user)) {
            return response(['message' => 'not authorized'], 403);
        }

        $user->roles()->detach($validated['role_id']);

        return response(['message' => 'user role removed seccessfully.'], 200);
    }

    public function add_skill(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'skill_id' => ['required', 'integer', 'numeric', 'exists:skills,id']
        ]);

        if ($request->user()->cannot('add_skill', $user)) {
            return response(['message' => 'not authorized'], 403);
        }

        $user->skills()->attach($validated['skill_id']);

        return response(['message' => 'skill added to user seccessfully.'], 200);
    }

    public function remove_skill(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'skill_id' => ['required', 'integer', 'numeric', 'exists:skills,id']
        ]);

        if(!$user->skills->contains($validated['skill_id'])){
            return response(['message' => 'user has not that skill'], 403);
        }

        if ($request->user()->cannot('remove_skill', $user)) {
            return response(['message' => 'not authorized'], 403);
        }

        $user->skills()->detach($validated['skill_id']);

        return response(['message' => 'user skill removed seccessfully.'], 200);
    }
}
