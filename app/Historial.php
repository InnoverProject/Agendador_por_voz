<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{ 
    use ModelHelper;

   protected $table='historial';
   public $primaryKey = 'id';
   public $timestamps = true;

   protected $fillable = [
        'antecedentes','fecha_ingreso','id_medico','id_paciente',
    ];

      public function padecimiento()
    {
        return $this->hasMany(\App\Padecimiento::class, 'id_historial', 'id');
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
 