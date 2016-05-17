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

    protected $hidden = [
        'User_id',
    ];

    public function scopeMine($query)
    {
        return $query->where('User_id', \Illuminate\Support\Facades\Auth::id())->first(['FriendsList'])->toArray()['FriendsList'];
    }

    public function myFriends(User $user)
    {
        return $this->hasMany('Friends');
    }

    public function myFriendsRequest(User $user){

    }
}