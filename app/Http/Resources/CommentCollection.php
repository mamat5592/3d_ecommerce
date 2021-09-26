<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($comment) {
            return [
                'user' => $comment->user,
                'text' => $comment->text,
                'replyTo' => $comment->reply,
                'createdAt' => $comment->createdAt
            ];
        });
    }
}
