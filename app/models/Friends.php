<?php

namespace SocialApp\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use SocialApp\Models\User;

class Friends extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'friends';

    protected $fillable = [
        'FriendsList',
        'FriendsRequest',
    ];

    public function myFriends(User $user)
    {
        $friends = Friend::FriendsList;

        return $friends;
    }

    public function myFriendsRequest(User $user){

    }
}