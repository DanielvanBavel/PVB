<?php

namespace SocialApp\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use SocialApp\Models\Statuses;


class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('timeline.index');
        }
        return view('home');
    }

    public function submitPost(Request $request)
    {
    	var_dump($request->input('status'));
    }
}