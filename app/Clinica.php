<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
  

    protected $table='clinica';
   public $primaryKey = 'id';
   public $timestamps = true;

   protected $fillable = [
        'nombre','telefono','email','iva','direccion','ciudad','region','cod_postal','color','estatus'
    ]; 

     public function paciente()
    {
        return $this->hasOne(\App\Paciente::class, 'id_clinica', 'id');
    }

       public function medico()
    {
        return $this->hasOne(\App\Medico::class, 'id', 'id_clinica');
    }  
}
