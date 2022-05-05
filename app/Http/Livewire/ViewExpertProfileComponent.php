<?php

namespace App\Http\Livewire;

use App\Models\File;
use App\Models\User;
use Livewire\Component;

class ViewExpertProfileComponent extends Component
{
    public $user_id;
    public $user;
    public $userfills;

    public function mount($user_id)
    {

       $user = User::Where('id',$user_id)->first();
       $this->user = $user;
       $userfills = File::Where('user_id',$user_id)->get();
       $this->userfills = $userfills;
      

    }
    public function download($id)
    {
        $file =File::find($id);
        return response()->download(storage_path('app/public/'. $file->file_path));
    }
    public function render()
    {
        return view('livewire.view-expert-profile-component');
    }
}
