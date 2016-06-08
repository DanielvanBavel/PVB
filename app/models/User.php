<?php

namespace SocialApp\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    // protected $dates = ['created_at', 'updated_at', 'birthdate'];

    protected $fillable = [
        'email',
        'password',
        'birthdate',
        'firstname',
        'lastname',
        'adres',
        'zipcode',
        'place',
        'province',
        'phonenumber',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAdmin()
    {
        return false;
    }

    public function getName() {
        return $this->firstname . " " . $this->lastname;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getProfileImg() {
        return $this->profile_img;
    }    

    public function isFriendsWith(User $user) {
       return (bool) $this->friends()->where('id', $user->id)->count();
    }
  
    public function myFriends() {
        return $this->BelongsToMany('SocialApp\Models\User', 'friends', 'user_id', 'friend_id');
    }

    public function friendOf() {
        return $this->BelongsToMany('SocialApp\Models\User', 'friends', 'friend_id', 'user_id');
    }

    public function friends() {
        return $this->myFriends()->wherePivot('accepted', true)->get()->
        merge($this->friendOf()->wherePivot('accepted', true)->get());
    }
    
    public function friendsRequests() {
        return $this->myFriends()->wherePivot('accepted', false)->get();
    }

    public function addFriend(User $user) {
        $this->friendOf()->attach($user->id);
    }

    public function statuses() {
        return $this->hasMany('SocialApp\Models\Status', 'user_id');
    }

    // public function likes()
    // {
    //     return $this->hasMany('SocialApp\Models\Like', 'user_id');
    // }

    // public function hasLikedStatus(Status $status) {
    //     return (bool) $status->likes
    //                 ->where('user_like_id', $status->id)
    //                 ->where('user_id', $this->id)
    //                 ->count();
    // }

    public function admin(User $user) {
        return $this->BelongsTo('SocialApp\Models\Admin', 'user_id');
    }
}