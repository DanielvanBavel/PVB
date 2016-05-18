<?php

// namespace SocialApp\Models;

// use Illuminate\Auth\Authenticatable;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use SocialApp\Models\User;

// class Friends extends Model implements AuthenticatableContract
// {
//     use Authenticatable;

//     protected $table = 'friends';

//     protected $fillable = [
//         'FriendsList',
//         'FriendsRequest',
//     ];

//     protected $hidden = [
//         'User_id',
//     ];

//     public function scopeMine($query)
//     {
//         return $query->where('User_id', \Illuminate\Support\Facades\Auth::id())->first(['FriendsList'])->toArray()['FriendsList'];
//     }

//     public function myFriends() {
//         return $this->BelongsToMany('\SocialApp\Models\User', 'friends', 'user_id', 'friend_id');
//     }

//     public function friendOf() {
//         return $this->BelongsToMany('\SocialApp\Models\User', 'friends', 'friend_id', 'user_id');
//     }

//     public function friends() {
//         return $this->myFriends()->wherePivot('accepted', true)->get()->
//         merge($this->friendOf()->wherePivot('accepted', true)->get());
//     }
}