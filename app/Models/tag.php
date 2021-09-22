<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function tags(){
        return $this->belongsToMany(\App\Models\ThreeDModel::class, 'tag_three_d_model');
    }
}
