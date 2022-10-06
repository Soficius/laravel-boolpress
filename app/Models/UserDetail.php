<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public function user()
    {
        // il verbo che usiamo è belongsTo perche UserDetail ha una relazione 1 a 1 e la prendiamo come reverse di User
        return $this->belongsTo('App\User');
    }
}
