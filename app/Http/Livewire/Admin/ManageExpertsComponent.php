<?php

namespace App\Http\Livewire\Admin;

use App\Models\Profile;
use Livewire\Component;
use App\Models\User;

class ManageExpertsComponent extends Component
{
    public $searchTerm;


  
    public function deleteUser($id)
    {
        $user =User::find($id);
        $user->delete();
            
            //send message to user
        session()->flash('message','User has been deleted successfully!');
    }
    

    public function render()
    {
        $search ='%'.$this->searchTerm. '%';

        $users = User::where('name','LIKE', $search)
                ->orWhere('email','LIKE',$search)
                ->orWhere('id','LIKE',$search)-> paginate()
                ->where('utype', 'EXP');

        return view('livewire.admin.manage-experts-component',['users'=>$users])->layout('layouts.base');
    }
}
