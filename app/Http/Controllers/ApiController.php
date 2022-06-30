<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function showallpartners(){

        //return Partner::with('specialties')->get();

        return Partner::select('id', 'name', 'lastname', 'phone', 'email', 'country_residence', 'state', 'city')
                        ->with('specialties:name_specialty')
                        ->get();
    }
}
