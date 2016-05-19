<?php

namespace SocialApp\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use SocialApp\Models\Status;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $statuses = Status::notReply()->where(function ($query) {
                return $query->where('user_id', Auth::user()->id)
                    ->orWhereIn('user_id', Auth::user()->friends()->lists('id'));
            })->orderBy('created_at', 'desc')->get();

            return view('timeline.index')->with('statuses', $statuses);
        }
        return view('home');
    }

    public function submitPost(Request $request)
    {
    	var_dump($request->input('status'));
    }
}