<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulate extends Model
{
    protected $fillable = [
        'country', 'slug','header',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
