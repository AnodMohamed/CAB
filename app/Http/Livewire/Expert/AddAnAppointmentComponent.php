<?php

namespace App\Http\Livewire\Expert;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddAnAppointmentComponent extends Component
{
    public $appointment;

    public function updated($fields){
        $this->validateOnly($fields,[
            'appointment' => 'required',
        ]);
    }

    public function storeAppointment(){

        $this->validate([
            'appointment' => 'required',
        ]);
        $appointmentrow= new Appointment();
        $appointmentrow->appointment = $this->appointment;
        $appointmentrow->end_time =  Carbon::parse($this->appointment)->addHour(1);
        $appointmentrow->expert_id = Auth::user()->id;
        $appointmentrow->save();
        session()->flash('message','Appointment has been created successfully!');
    }
    public function render()
    {
        return view('livewire.expert.add-an-appointment-component')->layout('layouts.base');
    }
}
