<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Consulta;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $consulta=new Consulta;

          try {

            
        $consulta->nombre=$request->nombre;
        $consulta->apellido_pat=$request->ape_pat;
        $consulta->apellido_mat=$request->ape_mat;
        $consulta->edad=$request->edad;
        $consulta->talla=$request->talla;
        $consulta->peso_actual=$request->peso;
        $consulta->consulta_por=$request->consulta_por;
        $consulta->examen_fisico=$request->examen_fisico;
        $consulta->examen_laboratorio=$request->examen_laboratorio;
        $consulta->diagnostico=$request->diagnostico;
        $consulta->estatus=1;
        $consulta->id_medico=Auth::user()->medico->id;
        $consulta->id_paciente=$request->id;
        $consulta->save();
        echo $consulta->id;
        }
        catch (Illuminate\Database\QueryException $e){
            if (1062 == $e->errorInfo[1]) {
                echo 'Ya existe un registro con el mismo correo electrónico';
            } else {
                echo $e;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
