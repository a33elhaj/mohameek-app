<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function message(Request $request)
    {
        event(new ChatEvent($request->input('name'), $request->input('text')));

        return [];
    }

    
}
