<?php

namespace SocialApp\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Friend extends Model implements AuthenticatableContract
{
	use Authenticatable;

    protected $table = 'friends';
}