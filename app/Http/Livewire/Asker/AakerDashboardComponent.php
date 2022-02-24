<?php

namespace App\Http\Livewire\Asker;

use Livewire\Component;
use App\Http\Middleware\AuthAsker;
use Illuminate\Support\Facades\Auth;
class AakerDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.asker.aaker-dashboard-component')->layout('layouts.base');
    }
}
