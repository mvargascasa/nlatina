<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Post;

class CardPost extends Component
{

    use WithPagination;

    public $limitposts = 3;
    public $totalposts = 0;

    public function mount(){
        $this->totalposts = Post::where('status', 'PUBLICADO')->count();
    }

    public function loadMore(){
        $this->limitposts = $this->limitposts + 3;
    }

    public function render()
    {
        return view('livewire.card-post', [
            'posts' => Post::limit($this->limitposts)->get(),
        ]);
    }
}
