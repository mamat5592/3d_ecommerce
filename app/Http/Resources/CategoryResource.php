<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'three_d_models' => new ThreeDModelCollection($this->three_d_models()->take(3)->get())
        ];
    }
}
