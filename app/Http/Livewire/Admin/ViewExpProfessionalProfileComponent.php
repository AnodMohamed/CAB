<?php

namespace App\Http\Livewire\Admin;

use App\Models\File;
use Livewire\Component;
use App\Models\User;

class ViewExpProfessionalProfileComponent extends Component
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
        
        return view('livewire.admin.view-exp-professional-profile-component')->layout("layouts.base");
    }
}
