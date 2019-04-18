<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{

    protected $table = 'quotes';

    protected $fillable = [
        'quote', 'user_id', 'category_id'
    ];

    protected $hidden = [
        'id'
    ];

}
