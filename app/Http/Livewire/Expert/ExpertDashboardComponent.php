<?php

namespace App\Http\Livewire\Expert;

use Livewire\Component;
use App\Http\Middleware\AuthExpert;
use Illuminate\Support\Facades\Auth;
class ExpertDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.expert.expert-dashboard-component')->layout('layouts.base');
    }
}
