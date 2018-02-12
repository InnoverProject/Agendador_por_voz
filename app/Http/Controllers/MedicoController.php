<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidad;
use App\Medico;
//use App\Perfil;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Crypt;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.medico.index');
    }

    /**
     * 
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
         $medico=new Medico;

          try {


        $medico->nombre=$request->nom;
        $medico->apellido_pat=$request->ape_pat;
        $medico->apellido_mat=$request->ape_mat;
        $medico->direccion=$request->dir;
        $medico->edad=$request->edad;
        $medico->sexo=$request->sex;
        $medico->telefono=$request->tel;
        $medico->correo=$request->correo;
        $medico->hra_entrada=$request->entrada;
        $medico->hra_salida=$request->salida;
        $medico->cedula=$request->ced;
        $medico->estatus=1;
        $medico->id_especialidad=$request->especialidad;
        $medico->save();
        echo $medico->id;
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

 


            $medico = DB::select($this->consultaUsuarios());
           // $archivo = DB::select($this->archivos(6));
            $total_records = count($medico);
            $paginas = ceil($total_records / $rp);

            if($page > $paginas)
                $page = 1;

            $offset = ($page - 1) * $rp;

         
            

            //$editar = $this->tienePermiso('EDITAR_AREA');
        
            $medicos = $medico;

//            dd($users);
            
            $data = array();
            $data['page'] = $page;
            $data['total'] = $total_records;
            $data['rows'] = array();
            foreach ($medicos as $medico) { 

                     $data['rows'][] = array(
                        'id' => $medico->id,
                        'cell' => array(
                                $medico->nombreusuario,
                                $medico->telefono,
                                $medico->correo,
                                '<a onclick="agregar('.$medico->id.')" class="btn btn-sm btn-warning" title="Editar"><span><i class="fa fa-pencil"></i></span></a>'.
                               
                                    //Eliminar
                                    '<a onclick="eliminar('.$medico->id.')" class="btn btn-sm btn-danger" title="Eliminar"><span><i class="fa fa-times"></i></span></a>'
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
        $especialidad=Especialidad::select('*')->orderBy('nombre','asc')->get();
        //$perfil=Perfil::select('*')->orderBy('nombre','asc')->get(); 
        if ($id==0) {
           
        return view('admin.medico.agregar')->with('especialidades',$especialidad)->render();
    }
    if ($id>0) {
         $medicos=Medico::select('*')->where('id',$id)->orderBy('nombre','asc')->get();
         return view('admin.medico.editar')->with('especialidades',$especialidad)->with('medicos',$medicos)->render();   
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
        $medico = Medico::findOrFail($request->id);

         try {
        $medico->nombre=$request->nom;
        $medico->apellido_pat=$request->ape_pat;
        $medico->apellido_mat=$request->ape_mat;
        $medico->direccion=$request->dir;
        $medico->edad=$request->edad;
        $medico->sexo=$request->sex;
        $medico->telefono=$request->tel;
        $medico->correo=$request->correo;
        $medico->hra_entrada=$request->entrada;
        $medico->hra_salida=$request->salida;
        $medico->cedula=$request->ced;
        $medico->estatus=$request->estatus;
        $medico->id_especialidad=$request->especialidad;
        $medico->save();
        echo $medico->id;
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
            $medico = Medico::find($id);
            $medico->estatus=0;
            $medico->save();
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

    $consulta="SELECT id,CONCAT(nombre, ' ',apellido_pat,' ',apellido_mat) as nombreusuario,telefono,correo 
               from medico where estatus=1";

    return $consulta;           

    }

}
