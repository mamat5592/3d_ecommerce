<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'three_d_model' => new ThreeDModelDataResource($this->three_d_model),
            'address' => $this->address,
            'is_primary' => $this->is_primary
        ];
    }
}
