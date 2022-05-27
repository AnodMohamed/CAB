<?php

namespace App\Http\Livewire\Asker;

use App\Models\Message;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewAppointmentComponent extends Component
{
    public function render()
    {
        $appointments = Transaction::where('asker_id', Auth::user()->id)->paginate(6);
        return view('livewire.asker.view-appointment-component',['appointments'=>$appointments])->layout('layouts.base');
    }
}
