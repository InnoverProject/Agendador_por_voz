<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidad;
use App\Medico;
use App\Clinica;
//use App\Perfil;
use Illuminate\Support\Facades\DB;
use Excel;
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
         $dato=Clinica::select('color')->get();
        foreach ($dato as $colors) {
            $color=$colors->color;
        }
        return view('admin.medico.index')->with('color',$color);
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
        $medico->telefono=$request->tel;
        $medico->edad=$request->edad;
        $medico->sexo=$request->sex;
        $medico->correo=$request->correo;
        $medico->estatus=$request->estatus;
        $medico->id_especialidad=$request->especialidad;
        $medico->id_clinica=$request->id_cli;
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
                                '<a onclick="agregar('.$medico->id.')" class="btn btn-sm btn-warning" title="Editar"><span><i class="fa fa-edit fa-2x"></i></span></a>'." ".
                                    '<a onclick="eliminar('.$medico->id.')" class="btn btn-sm btn-danger" title="Eliminar"><span><i class="fa fa-times fa-2x"></i></span></a>'." ".
                                    '<a onclick="perfilMed('.$medico->id.')" class="btn btn-sm btn-danger" title="Perfil médico" style="background-color:#2E2EFE;"><span><i class="fas fa-folder fa-2x"></i></span></a>'

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
        $especialidad=Especialidad::select('*')->where('estatus',1)->orderBy('nombre','asc')->get();
        $clinica=Clinica::select('id')->get();
        //$perfil=Perfil::select('*')->orderBy('nombre','asc')->get(); 
        if ($id==0) {
           
        return view('admin.medico.agregar')->with('especialidades',$especialidad)->with('clinicas',$clinica)->render();
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
        $medico->estatus=$request->estatus;
        $medico->id_especialidad=$request->especialidad;
        $medico->id_clinica=$request->id_cli;
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

    public function importar(Request $request){
        $archivo=$request->file;

      Excel::load($archivo, function($reader) {

         $result=$reader->get();
         //echo $result;
        
         foreach ($result as $key ) {
        //print_r($value->nombre);
        
        $medico=new Medico;
    
        $medico->nombre=$key->nombre;
        $medico->apellido_pat=$key->apellido_paterno;
        $medico->apellido_mat=$key->apellido_materno;
        $medico->direccion=$key->direccion;
        $medico->telefono=$key->telefono;
        $medico->edad=$key->edad;
        $medico->sexo=$key->sexo;
        $medico->correo=$key->correo;
        $medico->estatus=1;
        $medico->id_especialidad=$key->especialidad;
        $medico->id_clinica=$key->clinica;
        $medico->save();
        echo $medico->id;
        
       //echo $key->apellido_paterno;
             
         }


});


    }

}
