<?php

namespace App\Http\Controllers;

use App\Events\CustomerLawyerChatEvent;
use App\Models\ChatRoom;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    public function chatMessage(Request $request)
    {

        $room = ChatRoom::query()->get()
            ->where('customer_id', (int)$request->input('customer_id'))
            ->where('lawyer_id', (int)$request->input('lawyer_id'));

        // if ($room === []) {
        //     $room = $this->newChatRoom($request);
        // }

        $room = $this->newChatRoom($request);
        // return $room;
        event(new CustomerLawyerChatEvent($room->customer_id, $room->lawyer_id, $request->input('message')));
        $msg = Message::query()->create([
            'chatRoom_id' => $room->id,
            'message' => $request->input('message')
        ]);
        return $msg;
    }

    public function newChatRoom(Request $request)
    {
        $valid = $request->only([
            // 'room_id',
            'customer_id',
            'lawyer_id',
        ]);

        $created = ChatRoom::query()->create([
            'room_id' => 'customer_id' . $valid['customer_id'] . 'lawyer_id' . $valid['lawyer_id'],
            'customer_id' => $valid['customer_id'],
            'lawyer_id' => $valid['lawyer_id'],
        ]);

        return $created;
    }
}
