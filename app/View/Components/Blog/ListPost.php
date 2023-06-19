<?php

namespace App\View\Components\Blog;

use App\Post;
use Illuminate\View\Component;

class ListPost extends Component
{
    public $listpost = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->listpost = Post::where('category_id', 3)->limit(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.blog.list-post');
    }
}
