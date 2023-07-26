<?php

namespace App\Http\Livewire;
use App\Partner;

use Livewire\Component;

class PartnersVideos extends Component
{

    public $total = 3;


    public function getmore(){
        $this->total = $this->total + 3;
    }

    public function render()
    {

        $partner_videos = Partner::select('name', 'lastname', 'img_profile', 'slug', 'url_video')->where('status', 'PUBLICADO')->where('url_video', '!=', null)->take($this->total)->get();

        return view('livewire.partners-videos', [
            'partners_videos' => $partner_videos
        ]);
    }
}
