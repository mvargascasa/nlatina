<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'fname', 'lname', 'tlf',
        'email', 'interest', 'status',
        'message', 'comment', 'city',
        'iploc', 'user_id', 'assig_id',
        'assig_by', 'updat_by', 'provider',
        'provider_id',
    ];
}
