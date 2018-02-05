<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';

    protected $fillable = [
        'usuario', 'password', 'id_medico', 'id_perfil',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


   public function perfil()
    {
        return $this->hasOne(\App\Perfil::class, 'id', 'id_perfil');
    }

    public function medico()
    {
        return $this->hasOne(\App\Medico::class, 'id', 'id_medico');
    }


}
 