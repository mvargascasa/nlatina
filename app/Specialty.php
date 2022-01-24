<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{

    protected $table = "specialties";

    protected $fillable = [
        'id',
        'name_specialty'
    ];

    public function partners(){
        return $this->belongsToMany(Partner::class);
    }

    //SCOPE
    public function scopeNameSpecialty($query, $name_specialty){
        return $query->where('name_specialty', 'LIKE',  "%$name_specialty%");
    }
}
