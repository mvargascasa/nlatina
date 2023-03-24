<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

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
        'numlicencia',
        'company',
        'company_name',
        'phone', 
        'email',
        'password', 
        'biography_html',
        'slug',
        'old_slug',
        'status',
        'attached_file',
        'fecha_publicado',
        'checkterminos',
        'terminos_verified_at',
        'fb_id',
        'updated_count',
        'modals',
        'views',
        'url_video',
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

    public function scopeLastname($query, $lastname){
        if ($lastname) {
            return $query->where('lastname', 'LIKE', "%$lastname%");
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

    public function scopeFechaPublicado($query, $fecha_publicado){
        if($fecha_publicado){
            return $query->where('fecha_publicado', 'LIKE', "%$fecha_publicado%");
        }
    }

    public function scopeCreatedAt($query, $created_at){
        if($created_at){
            return $query->where('created_at', 'LIKE', "%$created_at%");
        }
    }

    public function scopeStatus($query, $status){
        if ($status) {
            return $query->where('status', 'LIKE', "%$status%");
        }
    }

    //RELACION
    public function specialties(){
        return $this->belongsToMany(Specialty::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function customers(){
        return $this->belongsToMany('App\Customer')
            ->withPivot('customer_id', 'partner_id', 'created_at', 'viewed');
    }
}