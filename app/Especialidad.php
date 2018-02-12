<?php

namespace App;

use Illuminate\Notifications\Notifiable;
//use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
     

   protected $table='especialidad';
   public $primaryKey = 'id';
   public $timestamps = true;

   protected $fillable = [
        'nombre','descripcion','estatus',
    ];


     public function medico()
    {
        return $this->hasMany(\App\Medico::class, 'id_especialidad', 'id');
    }


    
}
 