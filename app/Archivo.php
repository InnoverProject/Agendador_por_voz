<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelHelper;


class Archivo extends Model
{

	//use ModelHelper;
	protected $table = "archivos";
     /**
     * The primary key for the model.
     *
     * @var string
     */
    public $primaryKey = 'id';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    protected $fillable = [
        'nombre','id_paciente'
    ];

public function paciente()
    {
        return $this->hasMany(\App\Paciente::class, 'id_paciente', 'id');
    }


    //
}
