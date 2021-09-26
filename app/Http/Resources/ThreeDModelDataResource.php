<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThreeDModelDataResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'specification' => $this->specification,
            'view' => $this->view,
            'download' => $this->download,
            'price' => $this->price,
            'like' => $this->like,
            'created_at' => $this->created_at
        ];
    }
}
