<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function asker() {
        return $this->belongsTo(User::class, 'asker_id', 'id');
    }

    public function expert() {
        return $this->belongsTo(User::class, 'expert_id', 'id');
    }

    public function apppintment() {
        return $this->belongsTo(Appointment::class, 'appointment_id', 'id');
    }
}
