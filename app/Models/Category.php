<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function three_d_models(){
        return $this->belongsToMany(\App\Models\ThreeDModel::class, 'category_three_d_model');
    }
}
