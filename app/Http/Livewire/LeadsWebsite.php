<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Lead;

class LeadsWebsite extends Component
{    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $pagination;

    public $names, $location, $office, $from_date, $to_date;

    public function mount($take){
        $this->pagination = $take;
    }

    public function clean(){
        $this->names = "";
        $this->location = "";
        $this->office = "";
        $this->from_date = "";
        $this->to_date = "";
    }

    public function render()
    {

        $leads_filter = Lead::orderBy('id', 'desc');

        if($this->names) $leads_filter->where('name', 'LIKE', '%'.$this->names.'%')->orWhere('lastname', 'LIKE', '%'.$this->names.'%');
        if($this->location) $leads_filter->where('country', 'LIKE', '%'.$this->location.'%')->orWhere('state', 'LIKE', '%'.$this->location.'%');
        if($this->office && $this->office != "") $leads_filter->where('interest', 'LIKE', '%'.$this->office.'%');
        if($this->from_date || $this->to_date) $leads_filter->whereBetween('created_at', [$this->from_date, $this->to_date]);

        $leads = $leads_filter->paginate($this->pagination);

        $total_leads = $leads->total();

        return view('livewire.leads-website', compact('leads', 'total_leads'));
    }
}
