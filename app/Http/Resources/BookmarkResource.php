<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookmarkResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserDataResource($this->user),
            'three_d_model' => new UserDataResource($this->three_d_model),
            'created_at' => $this->created_at
        ];
    }
}
