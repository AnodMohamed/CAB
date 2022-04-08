<?php

namespace App\Http\Livewire\Admin;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ManageAskersComponent extends Component
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
                ->where('utype', 'ASK');

        //get user data
        
        return view('livewire.admin.manage-askers-component',['users'=>$users])->layout('layouts.base');

    }
}
