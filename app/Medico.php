<?php
 
namespace App;

use Illuminate\Notifications\Notifiable;
//use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //use ModelHelper;

   protected $table='medico';
   public $primaryKey = 'id';
   public $timestamps = true;
 

    protected $fillable = [
        'nombre','apellido_pat','apellido_mat','direccion','edad','sexo','telefono','correo','hra_entrada','hra_salida','cedula','estatus','id_especialidad',
    ];


     public function user()
    {
        return $this->hasMany(\App\User::class, 'id_perfil', 'id');
    }

     public function paciente()
    {
        return $this->hasMany(\App\Paciente::class, 'id_medico', 'id');
    }


     public function especialidad()
    {
        return $this->hasOne(\App\Especialidad::class, 'id', 'id_especialidad');
    }

      public function medico()
    {
        return $this->hasMany(\App\Historial::class, 'id_medico', 'id');
    } 
   

     public function cita()
    {
        return $this->hasMany(\App\Cita::class, 'id_medico', 'id');
    }

     public function calificacion()
    {
        return $this->hasMany(\App\Calificacion::class, 'id_medico', 'id');
    }
}
 