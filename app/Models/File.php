<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'three_d_model_id',
        'address'
    ];

    public function three_d_model(){
        return $this->belongsTo(\App\Models\ThreeDModel::class);
    }
}
