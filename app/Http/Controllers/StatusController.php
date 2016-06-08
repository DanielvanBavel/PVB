<?php

namespace SocialApp\Http\Controllers;

use Auth;
use SocialApp\Models\User;
use Illuminate\Http\Request;
use SocialApp\Models\Status;

class StatusController extends Controller
{
    public function postStatus(Request $request)
    {       
		$this->validate($request, [
			'status' => 'required|max:1000',
		]);
       
        Auth::user()->statuses()->create([
            'body' => $request->input('status'),
        ]);
                
		return redirect()
				->route('home')
				->with('info', 'Status is geplaatst');
	}

	public function postReply(Request $request, $statusId)
    {
        $this->validate($request, [
            "reply-{$statusId}" => 'required|max:1000',
        ], [
            'required' => 'The reply body is required.'
        ]);

        $status = Status::notReply()->find($statusId);

        if (!$status) {
            return redirect()->route('home');
        }

        $reply = Status::create([
            'body' => $request->input("reply-{$statusId}"),
        ])->user()->associate(Auth::user());

        $status->replies()->save($reply);

        return redirect()->back();
    }

	public function getLikes($statusId) {

        dd($statusId);

       // $status = Status::find($statusId);

        // if (!Auth::user()->isFriendsWith($status->user)) {
        //     return redirect()->route('home');
        // }

        // if (Auth::user()->hasLikedStatus($status)) {
        //     return redirect()->back()->with('info', 'deze status is al geliked');
        // }

        // $like = $status->likes()->create([]);

        // dd($like);
        // Auth::user()->likes()->save($like);

        // return redirect()->back();
    }
}