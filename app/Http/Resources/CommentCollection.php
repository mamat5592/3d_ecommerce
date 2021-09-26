<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($comment) {
            return [
                'id' => $comment->id,
                'text' => $comment->text,
                'reply_to' => $comment->reply,
                'created_at' => $comment->created_at
            ];
        });
    }
}
