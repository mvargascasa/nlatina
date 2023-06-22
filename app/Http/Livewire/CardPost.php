<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Post;

class CardPost extends Component
{
    public $posts = [];

    public function mount(){
        $this->posts = Post::where('category_id', 3)->get();
    }

    public function render()
    {
        return view('livewire.card-post');
    }
}
