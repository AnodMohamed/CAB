<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ManageReceivedComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-received-component')->layout("layouts.base");
    }
}
