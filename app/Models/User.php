<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
        'bio',
        'is_newsletter_on',
        'is_notification_on'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments(){
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function three_d_models(){
        return $this->hasMany(\App\Models\ThreeDModel::class);
    }

    public function carts(){
        return $this->hasMany(\App\Models\Cart::class);
    }

    public function bookmarks(){
        return $this->hasMany(\App\Models\Bookmark::class);
    }

    public function skills(){
        return $this->belongsToMany(\App\Models\Skill::class, 'skill_user');
    }
}
