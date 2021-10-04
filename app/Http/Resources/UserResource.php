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
            'comments' => new CommentCollection($this->comments()->take(3)->get()),
            'three_d_models' => new ThreeDModelCollection($this->three_d_models()->take(3)->get()),
            'carts' => new CartCollection($this->carts()->take(3)->get()),
            'bookmarks' => new BookmarkCollection($this->bookmarks()->take(3)->get()),
            'skills' => new SkillCollection($this->skills()->take(3)->get()),
            'roles' => new RoleCollection($this->roles()->take(3)->get()),
            'joined_at' => $this->created_at
        ];
    }
}
