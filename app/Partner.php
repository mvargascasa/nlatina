<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use App\Notifications\PartnerResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Partner extends Authenticatable
{
    use Notifiable;

    protected $table = "partners";

    protected $fillable = [
        'id', 
        'name', 
        'specialty',
        'nationality', 
        'country_residence',
        'company',
        'phone', 
        'email',
        'password', 
        'biography_html',
        'status',
        // 'confirmation_code', 
        'created_at', 
        'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PartnerResetPasswordNotification($token));
    }

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