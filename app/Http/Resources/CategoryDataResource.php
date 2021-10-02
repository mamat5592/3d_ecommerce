<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryDataResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
