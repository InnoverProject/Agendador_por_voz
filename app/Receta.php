<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
     use ModelHelper;

   protected $table='receta';
   public $primaryKey = 'id';
   public $timestamps = true;

   protected $fillable = [
        'medicamento','indicacion','descripcion','observacion','id_medico','id_paciente'
    ];
 

    
     public function medico()
    {
        return $this->hasMany(\App\Medico::class, 'id_medico', 'id');
    }

     public function paciente()
    {
        return $this->hasMany(\App\Paciente::class, 'id_paciente', 'id');
    }
}
