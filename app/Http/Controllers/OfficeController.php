<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficeController extends Controller
{  
    public function newjersey() {
        return view('offices.newjersey');
    } 
    public function traducciones() {
        return view('offices.traducciones');
    } 
    public function apostillas() {
        return view('offices.apostillas');
    } 
    public function poderes() {
        return view('offices.poderes');
    } 
    
}
