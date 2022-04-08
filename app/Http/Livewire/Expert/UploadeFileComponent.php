<?php

namespace App\Http\Livewire\Expert;
use App\Models\User;
use App\Models\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UploadeFileComponent extends Component
{

    public $user_id;
    public $title;
    public $file_path;
    
    // to upload file 
    use WithFileUploads;


    
    public function updated($fields)
    {   
        $this->validateOnly($fields,[
            'title'=>'required',
            'file_path'=>'required|mimes:pdf',
        ]);
    }
    public function fileUpload()
    {   
        $this->validate([
            'title'=>'required',
            'file_path'=>'required|mimes:pdf',
        ]);
       $file = new File();
       $file->title = $this->title;       
      // $file_path = $this->file_path->store('files','public');
       //$validateDate['file_path']=$file_path;
       $file->user_id = Auth::user()->id;  
       //File::create($validateDate);
       $fileName = $this->file_path->store('files','public');
       $file->file_path = $fileName;  
       $file->save();
       
       session()->flash('message', 'File is upload successfully');
       $this->emit('fileUploaded');

    }
    public function render()
    {
        $user =User::find(Auth::user()->id);

        return view('livewire.expert.uploade-file-component',['user'=>$user])->layout('layouts.base');
    }
}
