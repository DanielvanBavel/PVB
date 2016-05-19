<?php

namespace SocialApp\Http\Controllers;

use Auth;
use DB;
use SocialApp\Models\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
	public function getFriends() {
		$friends = Auth::user()->friends();

		return view('friends.index')->with([
			'friends' => $friends
		]);
	}

	public function AcceptFriendsRequests(){
		// $accept = Auth::user()->friendsRequests();
		
		// DB::table('friends')->Where('id' => $profile->id)
  //           ->and('accepted', 0)
  //           ->update(['accepted' => 1]);
  //           // ->redirect()->route('vrienden');
	}
}