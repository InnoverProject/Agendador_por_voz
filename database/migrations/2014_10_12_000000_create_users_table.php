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
        Schema::create('clinica', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre')->unique();
                $table->string('telefono');
                $table->string('email');
                $table->integer('iva');
                $table->string('direccion');
                $table->string('ciudad');
                $table->string('region');
                $table->string('cod_postal');
                $table->string('color');
                $table->integer('estatus')->default(1);
                //$table->rememberToken();
                $table->timestamps();
            });

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
                $table->text('permisos');
                //$table->rememberToken();
                $table->timestamps();
            });

         Schema::create('medico', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('nombre',50);
                    $table->string('apellido_pat');
                    $table->string('apellido_mat');
                    $table->string('direccion');
                    $table->integer('edad')->nullable();
                    $table->string('sexo')->nullable();
                    $table->string('telefono',25)->nullable();
                    $table->string('correo')->nullable();
                    $table->integer('estatus')->default(1);
                    $table->integer('id_especialidad')->unsigned();
                    $table->integer('id_clinica')->unsigned();
                   // $table->rememberToken();
                    $table->timestamps();  
                    $table->foreign('id_especialidad')->references('id')->on('especialidad');
                    $table->foreign('id_clinica')->references('id')->on('clinica');
        
        });


         Schema::create('perfil_medico', function (Blueprint $table) {
                $table->increments('id');
                $table->string('cedula');
                $table->string('casa_estudio');
                $table->string('descripcion');
                $table->integer('id_medico')->unsigned();
                //$table->rememberToken();
                $table->timestamps();
                $table->foreign('id_medico')->references('id')->on('medico');
            });

         Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('password');
            $table->integer('id_medico')->unsigned();
            $table->integer('id_perfil')->unsigned();
            //checar como poner foreign key predeterminada
            $table->integer('id_paciente');
            ///////
            $table->rememberToken();
            $table->timestamps();
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
                    $table->string('telefono',25)->nullable();
                    $table->string('correo')->nullable();
                    $table->string('fecha_nacimiento')->nullable();
                    $table->integer('estatus')->default(1);
                    $table->integer('id_medico')->unsigned();
                    $table->integer('id_clinica')->unsigned();
                   // $table->rememberToken();
                    $table->timestamps();  
                    $table->foreign('id_medico')->references('id')->on('medico');
                    $table->foreign('id_clinica')->references('id')->on('clinica');
        });

        Schema::create('receta', function (Blueprint $table) {
                $table->increments('id');
                //$table->string('medicamento');
                $table->string('indicacion');
                //$table->string('descripcion');
                $table->date('fecha');
                $table->integer('id_medico')->unsigned();
                $table->integer('id_paciente')->unsigned();
                //$table->rememberToken();
                $table->timestamps();
                $table->foreign('id_medico')->references('id')->on('medico');
                $table->foreign('id_paciente')->references('id')->on('paciente');
            });

            Schema::create('consulta', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nombre');
                $table->string('apellido_pat');
                $table->string('apellido_mat');
                $table->integer('edad');
                $table->decimal('talla',5,2);
                $table->decimal('peso_actual',5,2);
                $table->string('consulta_por');
                $table->string('examen_fisico');
                $table->string('examen_laboratorio');
                $table->string('diagnostico');
                $table->integer('estatus')->default(1);
                $table->integer('id_medico')->unsigned();
                $table->integer('id_paciente')->unsigned();
                //$table->rememberToken();
                $table->timestamps();
                $table->foreign('id_medico')->references('id')->on('medico');
                $table->foreign('id_paciente')->references('id')->on('paciente');
            });
   
   
//////?????????????????????????????????????????????????
        
  
////////////////////////////

           Schema::create('antecedente', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('alergia');
                    $table->string('enfermedad_cronica')->nullable();
                    $table->string('antecedente_quirurgico')->nullable();
                    $table->string('vacunas')->nullable();
                    $table->integer('id_paciente')->unsigned();
                    //$table->rememberToken();
                    $table->timestamps();  
                    $table->foreign('id_paciente')->references('id')->on('paciente');
                    
        });
  
             Schema::create('evaluacion', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('calificacion_medico');
                    $table->string('calificacion_consulta');
                    $table->string('calificacion_servicio');
                    $table->string('comentario');
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
                    $table->string('observacion');
                    $table->string('color');
                    $table->date('fecha');
                    $table->date('hora');
                    $table->integer('estatus')->default(1);
                    $table->integer('id_medico')->unsigned();
                    ///investigar poner foreign key default
                    $table->integer('id_paciente')->unsigned();
                   // $table->rememberToken();
                    $table->timestamps();  
                    $table->foreign('id_medico')->references('id')->on('medico');
                    $table->foreign('id_paciente')->references('id')->on('paciente');
                    
        });
           

            Schema::create('pago', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('cantidad');
                    $table->integer('id_medico')->unsigned();
                    ///investigar poner foreign key default
                    $table->integer('id_consulta')->unsigned();
                   // $table->rememberToken();
                    $table->timestamps();  
                    $table->foreign('id_medico')->references('id')->on('medico');
                    $table->foreign('id_consulta')->references('id')->on('consulta');
                    
        });
            
        Schema::create('archivos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre');
            $table->integer('id_paciente')->default(0);
            $table->timestamps();
           
        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinica');
        Schema::dropIfExists('users');
        Schema::dropIfExists('perfil');
        Schema::dropIfExists('medico');
        Schema::dropIfExists('paciente');
        Schema::dropIfExists('consulta');
        Schema::dropIfExists('antecedente');
        Schema::dropIfExists('receta');
        Schema::dropIfExists('cita');
        Schema::dropIfExists('perfil_medico');
        Schema::dropIfExists('evaluacion');
        Schema::dropIfExists('pago');
        Schema::dropIfExists('especialidad');
        Schema::dropIfExists('archivos');
    }
}
