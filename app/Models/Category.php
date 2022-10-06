<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //creiamo la relazione con post
    public function posts()
    {
        // utilizziamo il verbp hasMany perchè category è l'istanza forte
        return $this->hasMany('App\Models\Post');
    }
}
