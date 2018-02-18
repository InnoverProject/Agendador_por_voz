<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('clinica')->insert([
            'id' => '1',
            'nombre' => 'Hospital Medico Unidos Por La Salud',
            'telefono' => '3319182025',
            'email' => 'hmupls@gmail.com',
            'iva'=> '13',
            'direccion'=>'Av.Alcalde num.12456',
            'ciudad'=>'Guadalajara',
            'region'=>'Libertad',
            'cod_postal'=>'44750',
            'color'=>'#FFFF',
            'estatus'=>'1'
        ]);
         
         DB::table('perfil')->insert([
            'id' => '1',
            'nombre' => 'Superusuario',
            'rol' => 'Administrador',
            'permisos' => 'Todos'
           
        ]);

         DB::table('especialidad')->insert([
            'id' => '1',
            'nombre' => '----',
            'descripcion' => '-----',
            'estatus' => '1'
            
        ]);

         DB::table('medico')->insert([
            'id' => '1',
            'nombre' => '----',
            'apellido_pat' => '-----',
            'apellido_mat' => '-------',
            'direccion' => '------',
            'edad' => '000',
            'sexo' => '------',
            'telefono' => '------',
            'correo' => '------',
            'estatus' => '1',
            'id_especialidad' => '1',
            'id_clinica' => '1'
        ]);
        
          DB::table('users')->insert([
            'id' => '1',
            'nombre' => '----',
            'password' => bcrypt('12345678'),
            'id_medico' => '1',
            'id_perfil' => '1',
            'id_paciente'=>'0'
            
        ]);


    }
}
