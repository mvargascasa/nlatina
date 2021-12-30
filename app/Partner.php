<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Partner extends Authenticatable
{
    use Notifiable;

    protected $table = "partners";

    protected $fillable = [
        'id', 
        'name', 
        'lastname', 
        'specialty', 
        'country_residence',
        'phone', 
        'email',
        'password', 
        'biography_html',
        'status', 
        'created_at', 
        'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token'
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