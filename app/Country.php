<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "countries";

    protected $fillable = [
        'id',
        'name_country',
        'name_country_lower',
        'phonecode'
    ];
}
