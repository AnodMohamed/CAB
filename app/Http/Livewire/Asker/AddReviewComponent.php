<?php

namespace App\Http\Livewire\Asker;

use App\Models\Appointment;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddReviewComponent extends Component
{
    public $app_id;
    public $expert_id;
    public $content;


    public function mount($app_id)
    {
        $this->app_id=$app_id;
        $appointment = Appointment::where('id', $app_id)->first();
        $this->expert_id  = $appointment->expert_id;

    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'content' => 'required',
        ]);
    }

    public function storeReview()
    {
        $this->validate([
            'content' => 'required',
        ]);
        $review= new Review();
        $review->auther = Auth::user()->id;
        $review->person = $this->expert_id;
        $review->content = $this->content;
        $review->appointment_id = $this->app_id;
        $review->save();
        session()->flash('message','Review has been added successfully!');

    }



    public function render()
    {
        return view('livewire.asker.add-review-component');
    }
}
