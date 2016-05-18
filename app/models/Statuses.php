<?php

namespace SocialApp\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class STatuses extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'statuses';

    protected $fillable = [
        'body',
    ];

    public function getBody() {
        return $this->Body;
    }
}
