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
        'nombre','apellido_pat','apellido_mat','direccion','edad','sexo','telefono','correo','hra_entrada','hra_salida','cedula','estatus','id_especialidad','id_clinica'
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

        public function clinica()
    {
        return $this->hasMany(\App\Clinica::class, 'id_clinica', 'id');
    } 

      public function evaluacion()
    {
        return $this->hasOne(\App\Evaluacion::class, 'id', 'id_paciente');
    }

    public function perfil_med()
    {
        return $this->hasOne(\App\Perfil_medico::class, 'id_medico', 'id');
    } 

     public function receta()
    {
        return $this->hasOne(\App\Receta::class, 'id', 'id_medico');
    }

     public function antecedente()
    {
        return $this->hasOne(\App\Antecedente::class, 'id', 'id_medico');
    }

      public function pago()
    {
        return $this->hasOne(\App\Pago::class, 'id', 'id_medico');
    }
}
 