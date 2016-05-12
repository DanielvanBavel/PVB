<?php

namespace SocialApp\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Friends extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'friends';

    protected $fillable = [
        'FriendsList',
        'FriendsRequest',
    ];

    public function myFriends()
    {
        json_encode($this->FriendsList);
    }
}