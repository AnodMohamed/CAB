<?php

namespace App\Http\Livewire\Admin;

use App\Models\Profile;
use Livewire\Component;

class ChangeExpertStauts extends Component
{
    public $featured;
    public $user_id;

    public function mount($user_id)
    {
        $profile = Profile::where('user_id', $user_id)->first();
        $this->featured = $profile->featured;

    }
    
    public function updateStatus(){
        
        $profile = Profile::where('user_id', $this->user_id)->first();
        $profile->featured = $this->featured;
        $profile->save();
        session()->flash('message','Featured has been updated successfully!');
    }
    

       //$profile =Profile::find($this->user_id);
      //  dd($profile);
       // $profile->featured = $this->featured;
        //$profile->save();
        
        //session()->flash('message','Ticket has been updated successfully!');
    
    public function render()
    {

        return view('livewire.admin.change-expert-stauts')->layout('layouts.base');
    }
}
