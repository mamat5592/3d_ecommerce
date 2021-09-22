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
}
