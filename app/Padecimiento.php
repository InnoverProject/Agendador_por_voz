<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Padecimiento extends Model
{

	use ModelHelper;

   protected $table='padecimiento';
   public $primaryKey = 'id';
   public $timestamps = true;

   protected $fillable = [
        'descripcion','medicacion','id_historial',
    ];

 
     public function historial()
    {
        return $this->hasOne(\App\Historial::class, 'id', 'id_historial');
    }   
 
} 
    

