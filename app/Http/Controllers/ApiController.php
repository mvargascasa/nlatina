<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function showallpartners(){
        return Partner::select('name', 'lastname', 'phone', 'city')->get();
    }
}
