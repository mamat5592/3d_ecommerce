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
        if(auth()->user()->cannot('viewAny', )){
            return response(['message' => 'not authorized'], 403);
        }

        return new PermissionCollection(Permission::all());
    }

    public function store(PermissionStoreRequest $request)
    {
        if($request->user()->cannot('create')){
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return Permission::create($validated);
    }

    public function show($id)
    {
        if(auth()->user()->cannot('view', )){
            return response(['message' => 'not authorized'], 403);
        }

        $permission = Permission::findOrFail($id);

        return new PermissionResource($permission);
    }

    public function update(PermissionUpdateRequest $request, $id)
    {
        if($request->user()->cannot('update', )){
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();
        $permission = Permission::findOrFail($id);

        return $permission->update($validated);
    }

    public function destroy($id)
    {
        if(auth()->user()->cannot('delete', )){
            return response(['message' => 'not authorized'], 403);
        }

        $permission = Permission::findOrFail($id);

        return $permission->delete();
    }
}
