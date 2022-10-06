<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        // il verbo che usiamo è belongsTomany perchè siamo una relazione many to many
        return $this->belongsToMany('App\Models\Post');
    }
}
