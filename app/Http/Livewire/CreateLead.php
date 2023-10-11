<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Country;
use App\State;
use App\Models\Lead;

class CreateLead extends Component
{

    public $countries = [];
    public $states = [];
    public $inpName, $inpLastname, $selCountry, $selState, $inpPhone, $inpEmail, $selInterest, $txtMessage;

    public $saved = false;

    public function mount(){
        $this->countries = Country::all();
    }

    public function savelead(){

        if($this->selCountry) $country = Country::where('id', $this->selCountry)->first();
        
        $lead = Lead::create([
            'name' => $this->inpName,
            'lastname' => $this->inpLastname,
            'country' => $country->name_country,
            'state' => $this->selState,
            'phone' => $this->inpPhone,
            'email' => $this->inpEmail,
            'interest' => $this->selInterest,
            'message' => $this->txtMessage
        ]);

        if($lead->name != null) {

            $this->saved = true;
            
            $this->inpName = "";
            $this->inpLastname = "";
            $this->selCountry = "";
            $this->selState = "";
            $this->inpPhone = "";
            $this->inpEmail = "";
            $this->selInterest = "";
            $this->txtMessage = "";

        }
        
    }

    public function render()
    {

        if($this->selCountry != "") $this->states = State::where('country_id', $this->selCountry)->get();

        return view('livewire.create-lead', [
            'countries' => $this->countries,
            'states' => $this->states
        ]);
    }
}
