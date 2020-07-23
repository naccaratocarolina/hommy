<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Republics;
use App\Comments;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //an user can create n republics
    public function republics() {
        return $this->hasMany(App\Republic);
    }

    //an user can create n comments
    public function comments() {
        return $this->hasMany(App\Comment);
    }
}
