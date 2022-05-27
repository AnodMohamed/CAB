<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MessageComponent extends Component
{
    public function render()
    {
        
        $meesages =Message::where('sender', Auth::user()->id)
                            ->orWhere('receiver', Auth::user()->id)
                            ->orderBy('created_at', 'DESC')->get()->unique('massege_code');

        return view('livewire.message-component', compact('meesages'))->layout('layouts.base');
    }
}
