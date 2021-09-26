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
                'comments' => new CommentCollection($user->comments()->paginate(3)),
                'three_d_models' => $user->three_d_models()->paginate(3),
                'carts' => $user->carts()->paginate(3),
                'bookmarks' => $user->bookmarks()->paginate(3),
                'skills' => $user->skills()->paginate(3)
            ];
        });
    }
}
