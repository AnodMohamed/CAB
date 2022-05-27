<?php

namespace App\Http\Livewire\Expert;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageAppointmentsComponent extends Component
{
    public function render()
    {
        $appointments = Appointment::where('expert_id', Auth::user()->id)->paginate(6);
        
        return view('livewire.expert.manage-appointments-component',['appointments'=>$appointments])->layout('layouts.base');
    }
}
