<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BookmarkCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($bookmark) {
            return [
                'id' => $bookmark->id,
                'created_at' => $bookmark->created_at
            ];
        });
    }
}
