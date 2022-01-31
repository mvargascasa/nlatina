<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use App\Notifications\PartnerEmailVerificationNotification;
use App\Notifications\PartnerResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use willvincent\Rateable\Rateable;

class Partner extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Rateable;

    protected $table = "partners";

    protected $fillable = [
        'id', 
        'name', 
        'lastname',
        'title',
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
        'company_name',
        'phone', 
        'email',
        'password', 
        'biography_html',
        'slug',
        'status',
        'checkterminos',
        'terminos_verified_at',
        'created_at', 
        'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    //NOTIFICACION DE RECUPERACION DE CONTRASEÑA
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PartnerResetPasswordNotification($token));
    }

    //SOBREESCRIBIENDO METODO PARA RETORNAR EL SLUG
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    //SCOPE
    public function scopeName($query, $name){
        if($name){
            return $query->where('name', 'LIKE', "%$name%");
        }
    }
    
    public function scopeCountry($query, $country){
        $countryAux = Country::find($country);
        if ($countryAux) {
            return $query->where('country_residence', 'LIKE', "%$countryAux->name_country%");
        }
    }

    public function scopeState($query, $state){
        if($state){
            return $query->where('state', 'LIKE', "%$state%");
        }
    }

    public function scopeSpecialties($query, $specialty){
        return $query->whereHas('specialties', function($query) use ($specialty){
            $query->where('specialties.name_specialty', 'LIKE', "%$specialty%");
        });
    }

    //RELACION
    public function specialties(){
        return $this->belongsToMany(Specialty::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }
}