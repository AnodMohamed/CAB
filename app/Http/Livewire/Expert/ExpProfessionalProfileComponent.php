<?php

namespace App\Http\Livewire\Expert;

use App\Models\Category;
use Livewire\Component;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
class ExpProfessionalProfileComponent extends Component
{
    
    
    public $user_id;
    public $bio;
    public $price;
    public $category_id;

    public function mount(){
        $user =Profile::where('user_id',Auth::user()->id)->first();
        if($user != Null)
        {
            $this->id = $user->id;
            $this->bio = $user->bio;
            $this->price = $user->price;
            $this->category_id = $user->category_id;

        }
        /*
       
        */
    }

    public function updated($fields)
    {   
        $this->validateOnly($fields,[
            'bio'=>'required',
            'price'=>'required|numeric',
            'category_id'=>'required',
        ]);

    }
    public function updateProfile(){
        $this->validate([
            'bio'=>'required',
            'price'=>'required|numeric',
            'category_id'=>'required',
        ]);

        $user =Profile::where('user_id',Auth::user()->id)->first();

        if($user != Null)
        {
            $user->bio = $this->bio;
            $user->price = $this->price;
            $user->category_id = $this->category_id;
        }else{
            $user = new Profile();
            $user->user_id = Auth::user()->id;
            $user->bio = $this->bio;
            $user->price = $this->price;
        }
        $user->save();



        //send message to user
        session()->flash('message', 'Profional Profile is updated successfully');

    }
    
    public function render()
    {
        $user =User::find(Auth::user()->id);
        $categories = Category::all();
        return view('livewire.expert.exp-professional-profile-component',['user'=>$user,'categories'=>$categories])->layout('layouts.base');
    }
}
