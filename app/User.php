<?php

namespace App;

use App\nivel_interes;
use App\nivel_colegiaturas;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','apellido_p','apellido_m','edad', 'email','password','interes_id','colegiatura_id'
    ];

    public function interes(){
        return $this->belongsTo(nivel_interes::class);
    }

    public function colegiatura(){
        return $this->belongsTo(nivel_colegiaturas::class);
    }

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
}
