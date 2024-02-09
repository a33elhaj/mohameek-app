<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'message_id',
        'customer_id',
        'lawyer_id',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'chatRoom_id');
    }
}
