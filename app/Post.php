<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'quotes';

    protected $fillable = [
        'quote', 'idUser'
    ];

    protected $hidden = [
        'id'
    ];

    public function retrieveUser()
    {
        return $this->belongsTo('App\User');
    }

}
