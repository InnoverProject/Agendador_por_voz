<?php

namespace App; 

use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use ModelHelper;

   protected $table='cita';
   public $primaryKey = 'id';
   public $timestamps = true;

   protected $fillable = [
        'nombre','apellido_pat','apellido_mat','observacion','color','fecha','hora','estatus','id_medico','id_paciente'
    ];


    public function medico()
    {
        return $this->hasOne(\App\Medico::class, 'id', 'id_medico');
    } 

      public function paciente()
    {
        return $this->hasOne(\App\Paciente::class, 'id', 'id_paciente');
    } 
} 
