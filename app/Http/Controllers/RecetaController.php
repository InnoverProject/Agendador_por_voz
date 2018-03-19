<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Receta;
use App\Clinica;
class RecetaController extends Controller
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
          $receta=new Receta;

          try {

            
        $receta->indicacion=$request->message;
        $receta->fecha=$request->fecha;
        $receta->id_medico=Auth::user()->medico->id;
        $receta->id_paciente=$request->id;
        
        $receta->save();
        echo $receta->id;
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
