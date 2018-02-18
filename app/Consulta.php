<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelHelper; 
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
     use ModelHelper;

   protected $table='consulta';
   public $primaryKey = 'id';
   public $timestamps = true;

   protected $fillable = [
        'nombre','apellido_pat','apellido_mat','edad','talla','peso_actual','consuta_por','examen_fisico','examen_laboratorio','diagnostico','estatus','id_medico','id_paciente'
    ];


     public function medico()
    {
        return $this->hasMany(\App\Medico::class, 'id_medico', 'id');
    }

     public function paciente()
    {
        return $this->hasMany(\App\Paciente::class, 'id_paciente', 'id');
    }

     public function pago()
    {
        return $this->hasOne(\App\Pago::class, 'id', 'id_consulta');
    }
}
