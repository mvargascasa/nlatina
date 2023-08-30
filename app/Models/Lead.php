<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = "leads_website";
    
    protected $fillable = ['id', 'name', 'lastname', 'country', 'state', 'phone', 'email', 'interest', 'message', 'page', 'created_at', 'updated_at'];
    
}
