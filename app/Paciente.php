<?php 

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //use ModelHelper;

   protected $table='paciente';
   public $primaryKey = 'id';
   public $timestamps = true;

   protected $fillable = [
        'nombre','apellido_pat','apellido_mat','direccion','edad','sexo','telefono','correo','fecha_nacimiento','estatus','id_medico','id_clinica'
    ]; 

     public function medico()
    {
        return $this->hasOne(\App\Medico::class, 'id', 'id_medico');
    } 

      public function paciente() 
    {
        return $this->hasMany(\App\Cita::class, 'id_paciente', 'id');
    } 

    public function evaluacion()
    {
        return $this->hasMany(\App\Evaluacion::class, 'id_paciente', 'id');
    }
    
       public function usuario()
    {
        return $this->hasMany(\App\User::class, 'id_paciente', 'id');
    }
     
       public function clinica()
    {
        return $this->hasMany(\App\Clinica::class, 'id_clinica', 'id');
    }
     public function paciente_eval()
    {
        return $this->hasOne(\App\Evaluacion::class, 'id', 'id_paciente');
    } 

      public function receta()
    {
        return $this->hasOne(\App\Receta::class, 'id', 'id_paciente');
    }

    public function antecedente()
    {
        return $this->hasOne(\App\Antecedente::class, 'id', 'id_paciente');
    }

    public function archivo()
    {
        return $this->hasOne(\App\Archivo::class, 'id', 'id_paciente');
    }
} 
 