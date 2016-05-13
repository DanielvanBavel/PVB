<?php

namespace SocialApp\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'users';

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

    public function getAddress() {
        return $this->adres;
    }

    public function getZipcode() {
        return $this->zipcode;
    }

    public function getPlace() {
        return $this->place;
    }

    public function getProvince() {
        return $this->province;
    }

    public function getPhoneNumber() {
        return $this->phonenumber;
    }

    public function getProfileImg() {
        return $this->profile_img;
    }

    // public function statuses()
    // {
    //     return $this->hasMany('Chatty\Models\Status', 'user_id');
    // }

    // public function likes()
    // {
    //     return $this->hasMany('Chatty\Models\Like', 'user_id');
    // }

    // public function friendOf()
    // {
    //     return $this->belongsToMany('Chatty\Models\User', 'friends', 'friend_id', 'user_id');
    // }

    // public function friends()
    // {
    //     return $this->friendsOfMine()->wherePivot('accepted', true)->get()->merge($this->friendOf()->wherePivot('accepted', true)->get());
    // }

    // public function friendRequests()
    // {
    //     return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    // }

    // public function friendRequestsPending()
    // {
    //     return $this->friendOf()->wherePivot('accepted', false)->get();
    // }

    // public function hasFriendRequestPending(User $user)
    // {
    //     return (bool) $this->friendRequestsPending()->where('id', $user->id)->count();
    // }

    // public function hasFriendRequestReceived(User $user)
    // {
    //     return (bool) $this->friendRequests()->where('id', $user->id)->count();
    // }

    // public function addFriend(User $user)
    // {
    //     $this->friendOf()->attach($user->id);
    // }

    // public function acceptFriendRequest(User $user)
    // {
    //     $this->friendRequests()->where('id', $user->id)->first()->pivot->update([
    //         'accepted' => true,
    //     ]);
    // }

    // public function isFriendsWith(User $user)
    // {
    //     return (bool) $this->friends()->where('id', $user->id)->count();
    // }

    // public function hasLikedStatus(Status $status)
    // {
    //     return (bool) $status->likes->where('user_id', $this->id)->count();
    // }
}
