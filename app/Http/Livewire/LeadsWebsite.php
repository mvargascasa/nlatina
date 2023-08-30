<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lead;

class LeadsWebsite extends Component
{    
    public function render()
    {

        $leads_filter = Lead::orderBy('id', 'desc');

        $leads = $leads_filter->paginate(10);

        return view('livewire.leads-website', compact('leads'));
    }
}
