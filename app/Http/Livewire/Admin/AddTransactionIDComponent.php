<?php

namespace App\Http\Livewire\Admin;

use App\Models\Appointment;
use App\Models\Received;
use Livewire\Component;

class AddTransactionIDComponent extends Component
{
    public $transaction_id;
    public $expert_id;
    public $appointment_id;


    public function mount($appointment_id)
    {
        $appointment = Appointment::where('id', $appointment_id)->first();
        $this->expert_id = $appointment->expert_id ;
        $this->appointment = $appointment->appointment;

    }


    public function updated($fields){
        $this->validateOnly($fields,[
            'transaction_id' => 'required',
        ]);
    }

    public function storeTransaction(){

        $this->validate([
            'transaction_id' => 'required',
        ]);

        $received= new Received();
        $received->appointment_id = $this->appointment_id;
        $received->transaction_id = $this->transaction_id;
        $received->expert_id = $this->expert_id;
        $received->save();
        session()->flash('message','Received has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.add-transaction-i-d-component')->layout('layouts.base');
    }
}
