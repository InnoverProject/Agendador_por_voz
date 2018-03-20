<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelHelper; 
use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
     //use ModelHelper;

   protected $table='antecedente';
   public $primaryKey = 'id';
   public $timestamps = true;

   protected $fillable = [
        'alergia','enfermedad_cronica','antecedente_quirurgico','vacunas','id_paciente'
    ];
 

    public function paciente()
    {
        return $this->hasOne(\App\Paciente::class, 'id', 'id_paciente');
    }
}
