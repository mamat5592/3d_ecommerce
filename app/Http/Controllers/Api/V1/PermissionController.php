<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionStoreRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Http\Resources\PermissionCollection;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        if (auth()->user()->cannot('viewAny')) {
            return response(['message' => 'not authorized'], 403);
        }

        return new PermissionCollection(Permission::paginate(10));
    }

    public function store(PermissionStoreRequest $request)
    {
        if ($request->user()->cannot('create')) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return Permission::create($validated);
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        if (auth()->user()->cannot('view', $permission)) {
            return response(['message' => 'not authorized'], 403);
        }

        return new PermissionResource($permission);
    }

    public function update(PermissionUpdateRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);

        if ($request->user()->cannot('update', $permission)) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return $permission->update($validated);
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        if (auth()->user()->cannot('delete', $permission)) {
            return response(['message' => 'not authorized'], 403);
        }

        return $permission->delete();
    }
}
