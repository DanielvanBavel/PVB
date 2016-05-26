<?php

namespace SocialApp\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';

    protected $fillable = [
        'user_id',
        'email',
        'password',
        'activation_code'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAdmin()
    {
        return true;
    }

    public function user() {
        return $this->BelongsTo('SocialApp\Models\User', 'user_id');
    }
}