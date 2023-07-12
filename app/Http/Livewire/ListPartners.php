<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Partner;
use Livewire\WithPagination;
use Carbon\Carbon;

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

    public function clean(){
        $this->name = "";
        $this->lastname = "";
        $this->from_date_created = "";
        $this->to_date_created = "";
        $this->from_date_publicated = "";
        $this->to_date_publicated = "";
    }


    public function render()
    {
        $currentDate = Carbon::now()->addDay();

        return view('livewire.list-partners', [
            'partners' => Partner::where('name', 'LIKE', '%'.$this->name.'%')->where('lastname', 'LIKE', '%'.$this->lastname.'%')->whereBetween('created_at', [$this->from_date_created ? $this->from_date_created : "2021-11-01", $this->to_date_created ? $this->to_date_created : date(now())])->whereBetween('fecha_publicado', [$this->from_date_publicated ? $this->from_date_publicated : "2021-11-01", $this->to_date_publicated ? $this->to_date_publicated : $currentDate])->paginate(10),
            'total_partners' => Partner::where('name', 'LIKE', '%'.$this->name.'%')->where('lastname', 'LIKE', '%'.$this->lastname.'%')->whereBetween('created_at', [$this->from_date_created ? $this->from_date_created : "2021-11-01", $this->to_date_created ? $this->to_date_created : date(now())])->whereBetween('fecha_publicado', [$this->from_date_publicated ? $this->from_date_publicated : "2021-11-01", $this->to_date_publicated ? $this->to_date_publicated : $currentDate])->count(),
        ]);
    }
}
