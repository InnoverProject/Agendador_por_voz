<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Clinica;
//use App\Perfil;
use Illuminate\Support\Facades\DB;
class PerfilController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
         $dato=Clinica::select('color')->get();
        foreach ($dato as $colors) {
            $color=$colors->color;
        }
        return view('admin.perfil.index')->with('color',$color);
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
        $perfil=new Perfil; 
        
         try {
             $cadena="";
         if (isset($request->permisos)) {
                foreach($request->permisos as $permiso){
                        $cadena.=(empty($cadena))?$permiso:"|".$permiso;
                }//foreach
            }

        $perfil->nombre=$request->nombre;
        $perfil->rol=$request->rol;
        $perfil->permisos=$cadena;
        $perfil->save();
        echo $perfil->id;
        }
        catch (Illuminate\Database\QueryException $e){
            if (1062 == $e->errorInfo[1]) {
                echo 'Ya existe un registro con el mismo correo electrónico';
            } else {
                echo $e;
            }
        }
        
    }
     
     public function grid(Request $request){

       if ($request->ajax()) {

        ### Recibimos los parámetros de paginación y ordenamiento.

        if(isset($request->page) != ""){ $page = $request->page; }
        if(isset($request->sortname) != ""){ $sortname = $request->sortname; }
        if(isset($request->sortorder) != ""){ $sortorder = $request->sortorder; }
        if(isset($request->rp) != ""){ $rp = $request->rp; }

 


            $perfil = DB::select($this->consultaUsuarios());
           // $archivo = DB::select($this->archivos(6));
            $total_records = count($perfil);
            $paginas = ceil($total_records / $rp);

            if($page > $paginas)
                $page = 1;

            $offset = ($page - 1) * $rp;

         
            

            //$editar = $this->tienePermiso('EDITAR_AREA');
        
            $perfiles = $perfil;

//            dd($users);
            
            $data = array();
            $data['page'] = $page;
            $data['total'] = $total_records;
            $data['rows'] = array();
            foreach ($perfiles as $perfil) { 

                     $data['rows'][] = array(
                        'id' => $perfil->id,
                        'cell' => array(
                                $perfil->nombre,
                                $perfil->rol,
                                '<a onclick="agregar('.$perfil->id.')" class="btn btn-sm btn-warning" title="Editar"><span><i class="fa fa-edit fa-2x"></i></span></a>'." ".
                                    '<a onclick="eliminar('.$perfil->id.')" class="btn btn-sm btn-danger" title="Eliminar"><span><i class="fa fa-times fa-2x"></i></span></a>'
                                )
                    ); # code...
                 
              
            }


            echo json_encode($data);
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
        //$perfil=Perfil::select('*')->orderBy('nombre','asc')->get(); 
        if ($id==0) {
           
        return view('admin.perfil.agregar')->render();
    }
    if ($id>0) {
         $perfil=Perfil::findOrFail($id);
         $permisos = explode("|",$perfil->permisos);
         return view('admin.perfil.editar')->with('perfiles',$perfil)->with('permisos',$permisos)->render();   
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $perfil = Perfil::findOrFail($request->id);

        try { 
             $cadena="";
         if (isset($request->permisos)) {
                foreach($request->permisos as $permiso){
                        $cadena.=(empty($cadena))?$permiso:"|".$permiso;
                }//foreach
            }

        $perfil->nombre=$request->nombre;
        $perfil->rol=$request->rol;
        $perfil->permisos=$cadena;
        $perfil->save();
        echo $perfil->id;
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $perfil = Perfil::find($id);
            $perfil->delete();
            echo "Eliminado";
        } catch (Exception $e) {
            //print_r($e->errorInfo);
            if ($e->errorInfo[1]==1451) {
                echo 'No fue posible eliminarlo debido a que tiene información relacionada.';
            } else {
                echo $e;
            }
        }
    }

        public function consultaUsuarios(){

    $consulta="SELECT * from perfil";

    return $consulta;           

    }
}
