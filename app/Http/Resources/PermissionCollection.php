<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PermissionCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function($permission){
            return[
                'id' => $permission->id,
                'name' => $permission->name,
                'created_at' => $permission->created_at,
                'updated_at' => $permission->updated_at,
            ];
        });
    }
}
