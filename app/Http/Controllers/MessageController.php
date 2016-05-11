<?php

namespace SocialApp\Http\Controllers;

class MessageController extends Controller
{
    public function getMessages()
    {
            return view('messages.index');
    }
}