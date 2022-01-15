<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use App\Notifications\PartnerEmailVerificationNotification;
use App\Notifications\PartnerResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Partner extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = "partners";

    protected $fillable = [
        'id', 
        'name', 
        'specialty',
        'nationality', 
        'country_residence',
        'city',
        'state',
        'address',
        'link_facebook',
        'link_instagram',
        'link_linkedin',
        'website',
        'codigo_pais',
        'company',
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

    protected $casts = [
        'email_verified_at' => 'datetime'
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

    public function specialties(){
        return $this->belongsToMany(Specialty::class);
    }
}