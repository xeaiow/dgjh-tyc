<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'id', 'username', 'firstname', 'level', 'updated_at', 'created_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
