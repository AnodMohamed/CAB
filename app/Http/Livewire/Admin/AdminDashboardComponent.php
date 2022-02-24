<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-dashboard-component')->layout('layouts.base');

    }
}
