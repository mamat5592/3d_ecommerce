<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ThreeDModelCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($three_d_model) {
            return [
                'id' => $three_d_model->id,
                'name' => $three_d_model->name,
                'description' => $three_d_model->description,
                'specification' => $three_d_model->specification,
                'view' => $three_d_model->view,
                'download' => $three_d_model->download,
                'price' => $three_d_model->price,
                'like' => $three_d_model->like,
                'created_at' => $three_d_model->created_at
            ];
        });
    }
}
