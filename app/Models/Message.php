<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public function senderUser() {
        return $this->belongsTo(User::class, 'sender', 'id');
    }
    public function receiverUser() {
        return $this->belongsTo(User::class, 'receiver', 'id');
    }
}
