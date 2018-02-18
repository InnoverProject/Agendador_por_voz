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
        'nombre', 'password', 'id_medico', 'id_perfil','id_paciente'
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
      public function paciente()
    {
        return $this->hasOne(\App\Paciente::class, 'id', 'id_paciente');
    }

}
 