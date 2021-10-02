<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CartCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($cart) {
            return [
                'id' => $cart->id,
                'created_at' => $cart->created_at
            ];
        });
    }
}
