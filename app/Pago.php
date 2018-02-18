<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelHelper; 
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use ModelHelper;

   protected $table='pago';
   public $primaryKey = 'id';
   public $timestamps = true;

   protected $fillable = [
        'cantidad','id_medico','id_consulta'
    ];


     public function medico()
    {
        return $this->hasMany(\App\Medico::class, 'id_medico', 'id');
    }

     public function consulta()
    {
        return $this->hasMany(\App\Consulta::class, 'id_consulta', 'id');
    }
}
