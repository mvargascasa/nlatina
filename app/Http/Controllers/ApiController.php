<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function showallpartners(){

        $partners = Partner::select('id', 'name', 'lastname', DB::raw("CONCAT(partners.codigo_pais, '', partners.phone) AS phone_number"), 'email', 'country_residence', 'state', 'city')
                    ->with('specialties:name_specialty')
                    ->get();

        return $partners;
    }
}
