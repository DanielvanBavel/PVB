<?php

namespace SocialApp\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

Class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

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
    
    public function myFriends() {
        return $this->BelongsToMany('\SocialApp\Models\User', 'friends', 'user_id', 'friend_id');
    }

    public function friendOf() {
        return $this->BelongsToMany('\SocialApp\Models\User', 'friends', 'friend_id', 'user_id');
    }

    public function friends() {
        return $this->myFriends()->wherePivot('accepted', true)->get()->
        merge($this->friendOf()->wherePivot('accepted', true)->get());
    }
    
    public function friendsRequests() {
        return $this->myFriends()->wherePivot('accepted', false)->get();
    }
}