<?php

namespace App\Http\Livewire\Admin;

use App\Models\Transaction;
use Livewire\Component;

class ExpertTransactionsComponent extends Component
{
    public function render()
    {
        $transactioos = Transaction::paginate(6);
        return view('livewire.admin.expert-transactions-component',['transactioos'=>$transactioos])->layout('layouts.base');
    }
}
