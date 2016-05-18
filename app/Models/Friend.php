<?php

namespace SocialApp\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Friend extends Model implements AuthenticatableContract
{
	use Authenticatable;

    protected $table = 'friends';

    // public function myFriends() {
    //     return $this->BelongsToMany('\SocialApp\Models\Friend', 'friends', 'user_id', 'friend_id');
    // }

    // public function friendOf() {
    //     return $this->BelongsToMany('\SocialApp\Models\Friend', 'friends', 'friend_id', 'user_id');
    // }

    // public function friends() {
    //     $myFriends = $this->myFriends()->wherePivot('accepted', true)->get();


    //     return $myFriends->merge($this->friendOf()->wherePivot('accepted', true)->get());
    // }
}