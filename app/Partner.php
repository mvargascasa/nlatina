<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    // protected $table = "partners";

    protected $fillable = [
        'id', 
        'name', 
        'lastname', 
        'specialty', 
        'country_residence',
        'phone', 
        'email', 
        'biography_html',
        'status', 
        'created_at', 
        'updated_at'
    ];

    //SCOPE
    public function scopeCountry($query, $country){
        if ($country) {
            return $query->where('country_residence', 'LIKE', "%$country%");
        }
    }

    public function scopeSpecialty($query, $specialty){
        if ($specialty) {
            return $query->where('specialty', 'LIKE', "%$specialty%");
        }
    }
}


