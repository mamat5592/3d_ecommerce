<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThreeDModelResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserDataResource($this->user),
            'name' => $this->name,
            'description' => $this->description,
            'specification' => $this->specification,
            'view' => $this->view,
            'download' => $this->download,
            'price' => $this->price,
            'like' => $this->like,
            // 'carts' => new CartCollection($this->carts()->take(3)->get()),
            // 'bookmarks' => new BookmarkCollection($this->bookmarks()->take(3)->get()),
            // 'files' => new FileCollection($this->files()->take(3)->get()),
            // 'images' => new ImageCollection($this->images()->take(3)->get()),
            'comments' => new CommentCollection($this->comments()->take(3)->get()),
            // 'categories' => new CategoryCollection($this->categories()->take(3)->get()),
            'created_at' => $this->created_at
        ];
    }
}
