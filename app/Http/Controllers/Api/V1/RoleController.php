<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        if (auth()->user()->cannot('viewAny')) {
            return response(['message' => 'not authorized'], 403);
        }

        return new RoleCollection(Role::paginate(10));
    }

    public function store(RoleStoreRequest $request)
    {
        if ($request->user()->cannot('create')) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return Role::create($validated);
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);

        if (auth()->user()->cannot('viewAny', $role)) {
            return response(['message' => 'not authorized'], 403);
        }

        return new RoleResource($role);
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        $role = Role::findOrFail($id);

        if ($request->user()->cannot('update', $role)) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return $role->update($validated);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if (auth()->user()->cannot('delete', $role)) {
            return response(['message' => 'not authorized'], 403);
        }

        return $role->delete();
    }

    public function add_permission(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'permission_id' => ['required', 'integer', 'numeric', 'exists:permissions,id']
        ]);

        if ($request->user()->cannot('add_permission', $role)) {
            return response(['message' => 'not authorized'], 403);
        }

        $role->permissions()->attach($validated['permission_id']);

        return response(['message' => 'permission added to role seccessfully.'], 200);
    }

    public function remove_permission(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'permission_id' => ['required', 'integer', 'numeric', 'exists:permissions,id', 'exists:permission_role,permission_id']
        ]);

        if ($request->user()->cannot('remove_permission', $role)) {
            return response(['message' => 'not authorized'], 403);
        }

        $role->permissions()->detach($validated['permission_id']);

        return response(['message' => 'role permission removed seccessfully.'], 200);
    }
}
