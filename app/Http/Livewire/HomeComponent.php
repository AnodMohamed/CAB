<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $experts =User::where('utype','EXP')->get();
        return view('livewire.home-component',['experts'=>$experts])->layout('layouts.base');
    }
}
