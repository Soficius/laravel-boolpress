<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        // utilizziamo il verbp hasMany perchè category è l'istanza forte
        return $this->hasMany('App\Models\Post');
    }
    public function userDetail()
    {
        // utilizziamo il verbo hasOne perchè User è relazione 1 a 1 e la prendiamo per principale
        return $this->hasOne('App\Models\UserDetail');
    }
}
