<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Perfil_medico extends Model
{
    use ModelHelper;

   protected $table='perfil_medico';
   public $primaryKey = 'id';
   public $timestamps = true;

    protected $fillable = [
        'cedula','casa_estudio','descripcion','id_medico'
    ];

    public function medico()
    {
        return $this->hasOne(\App\Medico::class, 'id', 'id_medico');
    } 
}
