<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function three_d_model(){
        return $this->belongsTo(\App\Models\ThreeDModel::class);
    }
}
