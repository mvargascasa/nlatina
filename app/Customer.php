<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//CLASE PARA LOS CLIENTES DEL PARTNER
class Customer extends Model
{
    protected $table = "customer";

    protected $fillable = [
        'id', 'nombre', 'email', 'pais', 'estado', 'telefono', 'mensaje', 'proviene', 'tipo', 'created_at', 'updated_at'
    ];

    public $timestamps = false;

    public function partners(){
        return $this->belongsToMany('App\Partner')
        ->withPivot('customer_id', 'partner_id', 'created_at', 'viewed');
    }
}
