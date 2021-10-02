<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'three_d_model' => new ThreeDModelDataResource($this->three_d_model),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
