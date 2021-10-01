<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return new CommentCollection(Comment::paginate(10));
    }

    public function store(CommentStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        return Comment::create($validated);
    }

    public function show($id)
    {
        return new CommentResource(Comment::findOrFail($id));
    }

    public function update(CommentUpdateRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if($request->user()->cannot('update', $comment)){
            // abort(403);
            return response(['message' => 'not authorized'], 403);
        }

        return $comment->update($request->validated());
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if(auth()->user()->cannot('delete', $comment)){
            // abort(403);
            return response(['message' => 'not authorized'], 403);
        }

        return $comment->delete();
    }
}
