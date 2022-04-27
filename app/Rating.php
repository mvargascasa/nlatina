<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "ratings";

    public $fillable = [
        'rating',
        // 'rateable_id',
        'partner_id',
        'comment',
        'name_customer',
        'country'
    ];

    // public function rateable(){
    //     return $this->morphTo();
    // }

    public function partner(){
        return $this->belongsTo(Partner::class);
    }
}
