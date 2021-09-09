<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Evaluator extends Model
{
    use Notifiable;
    protected $guard = 'evaluator';

    protected $fillable = [
        'name', 'email', 'password',
        'first_name', 'family_name', 'first_name_kana', 'family_name_kana',
        'number', 'address', 'belong', 'status', 'url',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
