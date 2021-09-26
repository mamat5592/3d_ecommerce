<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function($user){
            return [
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'bio' => $user->bio,
                'comments' => $user->comments,
                'three_d_models' => $user->three_d_models,
                'carts' => $user->carts,
                'bookmarks' => $user->bookmarks,
                'skills' => $user->skills
            ];
        });
    }
}
