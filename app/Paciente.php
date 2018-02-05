<?php 

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use ModelHelper;

   protected $table='paciente';
   public $primaryKey = 'id';
   public $timestamps = true;

   protected $fillable = [
        'nombre','apellido_pat','apellido_mat','direccion','edad','sexo','estatura','tipo_sangre','telefono','correo','estatus','id_medico',
    ]; 

     public function medico()
    {
        return $this->hasOne(\App\Medico::class, 'id', 'id_medico');
    } 

      public function paciente()
    {
        return $this->hasMany(\App\Historial::class, 'id_paciente', 'id');
    } 

    public function calificacion()
    {
        return $this->hasMany(\App\Calificacion::class, 'id_paciente', 'id');
    }


} 
 