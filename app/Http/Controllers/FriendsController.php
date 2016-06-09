<?php

namespace SocialApp\Http\Controllers;

use Auth;
use DB;
use SocialApp\Models\User;
use SocialApp\Models\Friend;
use Illuminate\Http\Request;

class FriendsController extends Controller
{

	public function getFriends() {
		$friends = Auth::user()->friends();

		return view('friends.index')->with([
			'friends' => $friends
		]);
	}

	public function AcceptFriendsRequests(User $user, Request $request) {

		Friend::where('friend_id', $user->id)
			  ->where('accepted', 0)
              ->update(['accepted' => 1]);

        return redirect()->back();
	}

	public function SendFriendRequest(User $user) {
        $user = User::where('id', $user->id)->first();
        
        Auth::user()->addFriend($user);

        return redirect()
        		->route('home', ['name' => $user->getName()])
        		->with('info', 'Vriendschapsverzoek is verzonden');
    }
}