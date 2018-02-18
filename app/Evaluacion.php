<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model; 

class Evaluacion extends Model
{
	use ModelHelper;

   protected $table='evaluacion';
   public $primaryKey = 'id';
   public $timestamps = true;

   protected $fillable = [
        'calificacion_medico','calificacion_consulta','calificacion_servicio','comentario','id_medico','id_paciente'
    ];

 public function medico()
    {
        return $this->hasMany(\App\Medico::class, 'id_medico', 'id');
    }
  public function paciente()
    {
        return $this->hasMany(\App\Paciente::class, 'id_paciente', 'id');
    } 
    //
}
