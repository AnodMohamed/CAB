<?php

namespace App\Http\Livewire;

use App\Models\File;
use App\Models\User;
use Livewire\Component;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileComponent extends Component
{
    public function deleteFile($id)
    {
        $file =File::find($id);
        $file->delete();
        return redirect('/profile');
        //send message to user

    }

    public function download($id)
    {
        $file =File::find($id);
        return response()->download(storage_path('app/public/'. $file->file_path));
    }
    public function render()
    {
        /*
        $userProfile =Profile::where('user_id',Auth::user()->id)->first();
        if(!$userProfile)
        {
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }
        */
        $userfills =File::where('user_id',Auth::user()->id)->get();
       
        //to get user data 
        $user =User::find(Auth::user()->id);
        return view('livewire.profile-component',['user'=>$user,'userfills'=>$userfills])->layout('layouts.base');
    }
}
