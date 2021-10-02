<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FileCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($file) {
            return [
                'id' => $file->id,
                'name' => $file->name,
                'address' => $file->address,
                'created_at' => $file->created_at,
                'updated_at' => $file->updated_at
            ];
        });
    }
}
