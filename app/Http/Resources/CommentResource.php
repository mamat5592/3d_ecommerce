<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserDataResource($this->user),
            'text' => $this->text,
            'reply_to' => $this->reply,
            'three_d_model' => new ThreeDModelDataResource($this->three_d_model),
            'created_at' => $this->created_at
        ];
    }
}
