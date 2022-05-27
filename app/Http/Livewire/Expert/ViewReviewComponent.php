<?php

namespace App\Http\Livewire\Expert;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewReviewComponent extends Component
{
    public function render()
    {
        $reviews = Review::where('person', Auth::user()->id)->paginate(6);

        return view('livewire.expert.view-review-component',['reviews'=>$reviews])->layout('layouts.base');
    }
}
