<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ImageCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function($image){
            return[
                'id' => $image->id,
                'address' => $image->address,
                'is_primary' => $image->is_primary
            ];
        });
    }
}
