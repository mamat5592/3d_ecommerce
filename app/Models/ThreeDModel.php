<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreeDModel extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function bookmarks(){
        return $this->hasMany(\App\Models\Bookmark::class);
    }

    public function carts(){
        return $this->hasMany(\App\Models\Cart::class);
    }

    public function files(){
        return $this->hasMany(\App\Models\File::class);
    }

    public function images(){
        return $this->hasMany(\App\Models\Image::class);
    }

    public function categories(){
        return $this->belongsToMany(\App\Models\Category::class, 'category_three_d_model');
    }
}
