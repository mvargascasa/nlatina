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

    public function mount($take){
        $this->pagination = $take;
    }

    public function render()
    {

        $leads_filter = Lead::orderBy('id', 'desc');

        $leads = $leads_filter->paginate($this->pagination);

        return view('livewire.leads-website', compact('leads'));
    }
}
