<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartStoreRequest;
use App\Http\Requests\CartUpdateRequest;
use App\Http\Resources\BookmarkCollection;
use App\Http\Resources\BookmarkResource;
use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        if (auth()->user()->cannot('viewAny')) {
            return response(['message' => 'not authorized'], 403);
        }

        return new BookmarkCollection(Bookmark::all());
    }

    public function store(CartStoreRequest $request)
    {
        if ($request->user()->cannot('create')) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        return Bookmark::create($validated);
    }

    public function show($id)
    {
        $bookmark = Bookmark::findOrFail($id);

        if (auth()->user()->cannot('view', $bookmark)) {
            return response(['message' => 'not authorized'], 403);
        }

        return new BookmarkResource($bookmark);
    }

    public function update(CartUpdateRequest $request, $id)
    {
        $bookmark = Bookmark::findOrFail($id);

        if ($request->user()->cannot('update', $bookmark)) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return $bookmark->update($validated);
    }

    public function destroy($id)
    {
        $bookmark = Bookmark::findOrFail($id);

        if (auth()->user()->cannot('delete', $bookmark)) {
            return response(['message' => 'not authorized'], 403);
        }

        return $bookmark->delete();
    }
}
