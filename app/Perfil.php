<?php

namespace App;

use Illuminate\Notifications\Notifiable;
//use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
  // use ModelHelper;


   protected $table='perfil';
   public $primaryKey = 'id';
   public $timestamps = true;


    protected $fillable = [
        'nombre','rol','permisos','estatus',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  
    
     public function user()
    {
        return $this->hasMany(\App\User::class, 'id_perfil', 'id');
    }
}
