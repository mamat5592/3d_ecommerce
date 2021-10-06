<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageStoreRequest;
use App\Http\Requests\ImageUpdateRequest;
use App\Http\Resources\ImageCollection;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return new ImageCollection(Image::paginate(10));
    }

    public function store(ImageStoreRequest $request)
    {
        if ($request->user()->cannot('create')) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();
        $validated['address'] = 'image address'; // TODO

        return Image::create($validated);
    }

    public function show($id)
    {
        $image = Image::findOrFail($id);
        return new ImageResource($image);
    }

    public function update(ImageUpdateRequest $request, $id)
    {
        $image = Image::findOrFail($id);

        if ($request->user()->cannot('update', $image)) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return $image->update($validated);
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        if (auth()->user()->cannot('delete', $image)) {
            return response(['message' => 'not authorized'], 403);
        }

        return $image->delete();
    }
}
