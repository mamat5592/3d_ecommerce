<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'three_d_model_id',
        'address',
        'is_primary'
    ];

    public function three_d_model(){
        return $this->belongsTo(\App\Models\ThreeDModel::class);
    }
}
