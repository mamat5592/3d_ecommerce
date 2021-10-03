<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SkillCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($skill) {
            return [
                'id' => $skill->id,
                'name' => $skill->name,
            ];
        });
    }
}
