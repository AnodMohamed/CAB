<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Profile;
use Livewire\Component;

class SearchExpertComponent extends Component
{
    public $searchTerm;
    public $category_id;
    public $price= "desc";

    public function render()
    {
        $search ='%'.$this->searchTerm. '%';
        $category_id ='%'.$this->category_id. '%';

        
        $experts =Profile::Where('featured','LIKE','1')
                ->where('category_id','LIKE', $category_id)
                ->Where('bio','LIKE',$search)->Orderby('price', $this->price)->get();

        $categories = Category::all();


        return view('livewire.search-expert-component',['experts' => $experts,'categories' => $categories])->layout('layouts.base');
    }
}
