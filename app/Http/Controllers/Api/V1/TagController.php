<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Http\Resources\TagCollection;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return new TagCollection(Tag::paginate(10));
    }

    public function store(TagStoreRequest $request)
    {
        if($request->user()->cannot('create')){
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return Tag::create($validated);
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return new TagResource($tag);
    }

    public function update(TagUpdateRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);

        if($request->user()->cannot('update', $tag)){
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return $tag->update($validated);
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);

        if(auth()->user()->cannot('delete', $tag)){
            return response(['message' => 'not authorized'], 403);
        }

        return $tag->delete();
    }
}
