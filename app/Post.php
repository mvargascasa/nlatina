<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'consulate_id', 'name', 'slug', 'metadescrip', 'keywords',
        'body', 'status', 'imgdir', 'imgsmall', 'reading_time'
    ];
}
