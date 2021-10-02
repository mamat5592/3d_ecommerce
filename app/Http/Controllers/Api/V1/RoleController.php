<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        if(auth()->user()->cannot('viewAny', $roles)){
            return response(['message' => 'not authorized'], 403);
        }

        return new RoleCollection($roles);
    }

    public function store(RoleStoreRequest $request)
    {
        if($request->user()->cannot('create')){
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return Role::create($validated);
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);

        if(auth()->user()->cannot('viewAny', $role)){
            return response(['message' => 'not authorized'], 403);
        }

        return new RoleResource($role);
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        $role = Role::findOrFail($id);

        if($request->user()->cannot('update', $role)){
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return $role->update($validated);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if(auth()->user()->cannot('delete', $role)){
            return response(['message' => 'not authorized'], 403);
        }

        return $role->delete();
    }
}
