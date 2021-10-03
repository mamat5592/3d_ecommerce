<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileStoreRequest;
use App\Http\Requests\FileUpdateRequest;
use App\Http\Resources\FileCollection;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        if (auth()->user()->cannot('viewAny')) {
            return response(['message' => 'not authorized'], 403);
        }

        return new FileCollection(File::all());
    }

    public function store(FileStoreRequest $request)
    {
        if ($request->user()->cannot('create')) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();
        $validated['address'] = 'file address'; // TODO

        return File::create($validated);
    }

    public function show($id)
    {
        $file = File::findOrFail($id);

        if (auth()->user()->cannot('view', $file)) {
            return response(['message' => 'not authorized'], 403);
        }

        return new FileResource($file);
    }

    public function update(FileUpdateRequest $request, $id)
    {
        $file = File::findOrFail($id);

        if ($request->user()->cannot('update', $file)) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return $file->update($validated);
    }

    public function destroy($id)
    {
        $file = File::findOrFail($id);

        if (auth()->user()->cannot('delete', $file)) {
            return response(['message' => 'not authorized'], 403);
        }

        return $file->delete();
    }
}
