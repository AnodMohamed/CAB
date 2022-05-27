<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function asker() {
        return $this->belongsTo(User::class, 'auther', 'id');
    }

    public function expert() {
        return $this->belongsTo(User::class, 'person', 'id');
    }

  
}
