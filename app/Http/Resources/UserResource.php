<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'bio' => $this->bio,
            'is_newsletter_on' => $this->is_newsletter_on,
            'is_notification_on' => $this->is_notification_on,
            'comments' => $this->comments,
            'three_d_models' => $this->three_d_models,
            'carts' => $this->carts,
            'bookmarks' => $this->bookmarks,
            'skills' => $this->skills
        ];
    }
}
