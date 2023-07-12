<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Partner;
use Livewire\WithPagination;

class ListPartners extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name;
    public $lastname = "";
    public $from_date_created = "";
    public $to_date_created = "";
    public $from_date_publicated = "";
    public $to_date_publicated = "";


    public function render()
    {
        return view('livewire.list-partners', [
            'partners' => Partner::where('name', 'LIKE', '%'.$this->name.'%')->where('lastname', 'LIKE', '%'.$this->lastname.'%')->whereBetween('created_at', [$this->from_date_created ? $this->from_date_created : "2023-01-05", $this->to_date_created ? $this->to_date_created : "2023-05-01"])->paginate(10),
        ]);
    }
}
