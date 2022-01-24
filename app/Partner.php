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
        'lastname',
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

    public function scopeSpecialties($specialty){
        if ($specialty) {
            // return $query->where('specialty', 'LIKE', "%$specialty%");
            $partners = Partner::with(['specialties' => function($query){
                $query->nameSpecialty($this->specialty);
            }])->get();
            return $partners;
        }
    }

    //RELACION
    public function specialties(){
        return $this->belongsToMany(Specialty::class);
    }
}