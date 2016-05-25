<?php

namespace SocialApp\Models;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable;

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

    public function user() {
        return $this->BelongsTo('SocialApp\Models\User', 'user_id');
    }
}