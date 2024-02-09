<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'chatRoom_id',
        'message',
    ];

    public function chatRoom()
    {
        return $this->belongsTo(ChatRoom::class, 'chatRoom_id');
    }
}
