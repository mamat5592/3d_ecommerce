<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'users' => new UserCollection($this->users()->take(3)->get()),
            'name' => $this->name,
            'description' => $this->description,
            // 'permissions' => new PermissionCollection($this->permissions()->take(3)->get()),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
