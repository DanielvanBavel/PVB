<?php

namespace SocialApp\Http\Controllers;

use SocialApp\Models\User;

class MessageController extends Controller
{
    public function getMessages()
    {
        return view('messages.index');
    }
}