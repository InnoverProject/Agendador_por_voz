<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('especialidad', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre')->unique();
                $table->string('descripcion');
                $table->integer('estatus')->default(1);
                //$table->rememberToken();
                $table->timestamps();
            });

         Schema::create('perfil', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre');
                $table->string('rol');
                $table->string('permisos');
                $table->integer('estatus')->default(1);
                //$table->rememberToken();
                $table->timestamps();
            });

         Schema::create('medico', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('nombre',50);
                    $table->string('apellido_pat');
                    $table->string('apellido_mat');
                    $table->string('direccion');
                    $table->string('edad')->nullable();
                    $table->string('sexo')->nullable();
                    $table->string('telefono',25)->nullable();
                    $table->string('correo')->nullable();
                    $table->string('hra_entrada')->nullable();
                    $table->string('hra_salida')->nullable();
                    $table->string('cedula')->nullable();
                    $table->integer('estatus')->default(1);
                    $table->integer('id_especialidad')->unsigned();
                   // $table->rememberToken();
                    $table->timestamps();  
                    $table->foreign('id_especialidad')->references('id')->on('especialidad');
        
        });

         Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario')->unique();
            $table->string('password');
            $table->integer('id_medico')->unsigned();
            $table->integer('id_perfil')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_medico')->references('id')->on('medico');
            $table->foreign('id_perfil')->references('id')->on('perfil');
        });
  

        Schema::create('paciente', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('nombre',50);
                    $table->string('apellido_pat');
                    $table->string('apellido_mat');
                    $table->string('direccion');
                    $table->string('edad')->nullable();
                    $table->string('sexo')->nullable();
                    $table->string('estatura')->nullable();
                    $table->string('tipo_sangre')->nullable();
                    $table->string('telefono',25)->nullable();
                    $table->string('correo')->nullable();
                    $table->integer('estatus')->default(1);
                    $table->integer('id_medico')->unsigned();
                   // $table->rememberToken();
                    $table->timestamps();  
                    $table->foreign('id_medico')->references('id')->on('medico');
        
        });
   

         Schema::create('historial', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('antecedentes');
                    $table->date('fecha_ingreso');
                    $table->integer('id_medico')->unsigned();
                    $table->integer('id_paciente')->unsigned();
                   // $table->rememberToken();
                    $table->timestamps();  
                    $table->foreign('id_medico')->references('id')->on('medico');
                    $table->foreign('id_paciente')->references('id')->on('paciente');
        
        });
  


           Schema::create('padecimiento', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('descripcion');
                    $table->string('medicacion')->nullable();
                    $table->integer('id_historial')->unsigned();
                    //$table->rememberToken();
                    $table->timestamps();  
                    $table->foreign('id_historial')->references('id')->on('historial');
                    
        });
  
             Schema::create('calificacion', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('evaluacion');
                    $table->integer('id_medico')->unsigned();
                    $table->integer('id_paciente')->unsigned();
                    //$table->rememberToken();
                    $table->timestamps();  
                    $table->foreign('id_medico')->references('id')->on('medico');
                    $table->foreign('id_paciente')->references('id')->on('paciente');
        });

            
             Schema::create('cita', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('nombre',50);
                    $table->string('apellido_pat');
                    $table->string('apellido_mat');
                    $table->date('fecha');
                    $table->string('hora');
                    $table->integer('id_medico')->unsigned();
                   // $table->rememberToken();
                    $table->timestamps();  
                    $table->foreign('id_medico')->references('id')->on('medico');
                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
