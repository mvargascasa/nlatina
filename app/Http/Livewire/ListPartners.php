<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Partner;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ListPartners extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $lastname, $from_date_created, $to_date_created, $from_date_publicated, $to_date_publicated;

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
        $partners_filter = Partner::orderBy('id', 'desc');

        if($this->name) $partners_filter->where('name', 'LIKE', '%'.$this->name.'%');
        if($this->lastname) $partners_filter->where('lastname', 'LIKE', '%'.$this->lastname.'%');
        if($this->from_date_created || $this->to_date_created) $partners_filter->whereBetween('created_at', [$this->from_date_created, $this->to_date_created]);
        if($this->from_date_publicated || $this->to_date_publicated) $partners_filter->whereBetween('fecha_publicado', [$this->from_date_publicated, $this->to_date_publicated]);
        
        $partners = $partners_filter->paginate(10);
        $total_partners = $partners->total();

        return view('livewire.list-partners', compact('partners', 'total_partners'));
    }
}
