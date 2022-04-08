<?php

namespace App\Http\Livewire\Expert;

use Livewire\Component;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
class ExpProfessionalProfileComponent extends Component
{
    
    
    public $user_id;
    public $bio;
    public $price;

    public function mount(){
        $user =User::find(Auth::user()->id);
        $this->id = $user->id;
        $this->bio = $user->profile->bio;
        $this->price = $user->profile->price;
       // $this->category_id = $product->category_id;
    }

    public function updated($fields)
    {   
        $this->validateOnly($fields,[
            'bio'=>'required',
            'price'=>'required|numeric',
            //'category_id'=>'required',
        ]);

    }
    public function updateProfile(){
        $this->validate([
            'bio'=>'required',
            'price'=>'required|numeric',
            //'category_id'=>'required',
        ]);
        //send data to database
        $user =User::find(Auth::user()->id);
        $user->profile->bio = $this->bio;
        $user->profile->price = $this->price;
        
        //$product->category_id = $this->category_id;
        $user->profile->save();

        //send message to user
        session()->flash('message', 'Profional Profile is updated successfully');

    }
    
    public function render()
    {
        $user =User::find(Auth::user()->id);

        return view('livewire.expert.exp-professional-profile-component',['user'=>$user])->layout('layouts.base');
    }
}
