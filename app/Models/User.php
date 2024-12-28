<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements AuthenticatableContract
{
    use Notifiable;

    protected $table = 'users'; // nama tebel

    protected $fillable = [
        'name', 'email', 'password','role','icon','bio',
    ];

    protected $hidden = [
        'password', 'remember_token','role',
    ];
}
