<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Medico;
use App\Archivo;
use Illuminate\Support\Facades\Auth;
//use App\Perfil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class PacienteController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view('admin.paciente.index');
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
          $paciente=new Paciente;

          try { 


        $paciente->nombre=$request->nom;
        $paciente->apellido_pat=$request->ape_pat;
        $paciente->apellido_mat=$request->ape_mat;
        $paciente->direccion=$request->dir;
        $paciente->edad=$request->edad;
        $paciente->sexo=$request->sex;
        $paciente->telefono=$request->tel;
        $paciente->correo=$request->correo;
        $paciente->fecha_nacimiento=$request->fecha;
        $paciente->estatus=$request->estatus_id; 
        $paciente->id_medico=Auth::user()->medico->id;
        $paciente->id_clinica=Auth::user()->medico->id_clinica;
        $paciente->save();
        echo $paciente->id;
        /////voy aqui
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

 


            $paciente = DB::select($this->consultaUsuarios());
           // $archivo = DB::select($this->archivos(6));
            $total_records = count($paciente);
            $paginas = ceil($total_records / $rp);

            if($page > $paginas)
                $page = 1;

            $offset = ($page - 1) * $rp;

         
            

            //$editar = $this->tienePermiso('EDITAR_AREA');
        
            $pacientes = $paciente;

//            dd($users);
            
            $data = array();
            $data['page'] = $page;
            $data['total'] = $total_records;
            $data['rows'] = array();
            foreach ($pacientes as $paciente) { 

                     $data['rows'][] = array(
                        'id' => $paciente->id,
                         'cell' => array(
                                $paciente->nombreusuario,
                                $paciente->telefono, 
                                $paciente->correo,
                                $paciente->estatus,
                                '<a onclick="agregar('.$paciente->id.')" class="btn btn-sm btn-warning" title="Editar"><span><i class="fa fa-edit fa-2x"></i></span></a>'." ".
                                    '<a onclick="eliminar('.$paciente->id.')" class="btn btn-sm btn-danger" title="Eliminar"><span><i class="fa fa-times fa-2x"></i></span></a>'." ".
                                    '<a onclick="lista('.$paciente->id.')" class="btn btn-info btn-sm" title="Archivos"><span><i class="fas fa-folder-open fa-2x"></i></span></a>'." ".
                                    '<a onclick="lista('.$paciente->id.')" class="btn btn-success btn-sm" title="Consulta"><span><i class="fas fa-stethoscope fa-2x"></i></span></a>'." ".
                                    '<a onclick="receta('.$paciente->id.')" class="btn btn-sm" title="Receta" style="background-color:#F4A460;"><span><i class="fas fa-file-alt fa-2x"></i></span></a>'

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
         $medicos=Medico::where('estatus',1)->get();
        //$perfil=Perfil::select('*')->orderBy('nombre','asc')->get(); 
        if ($id==0) {
           
        return view('admin.paciente.agregar')->with('medicos',$medicos)->render();
    }
    if ($id>0) {
         $pacientes=Paciente::where('id',$id)->get();
         return view('admin.paciente.editar')->with('pacientes',$pacientes)->with('medicos',$medicos)->render();   
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
        $paciente=Paciente::findOrFail($request->id);

          try { 


        $paciente->nombre=$request->nom;
        $paciente->apellido_pat=$request->ape_pat;
        $paciente->apellido_mat=$request->ape_mat;
        $paciente->direccion=$request->dir;
        $paciente->edad=$request->edad;
        $paciente->sexo=$request->sex;
        $paciente->telefono=$request->tel;
        $paciente->correo=$request->correo;
        $paciente->fecha_nacimiento=$request->fecha;
        $paciente->estatus=$request->estatus_id; 
        $paciente->id_medico=Auth::user()->medico->id;
        $paciente->id_clinica=Auth::user()->medico->id_clinica;
        $paciente->save();
        echo $paciente->id;
        /////voy aqui
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
            $paciente = Paciente::find($id);
            $paciente->delete();
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

    $consulta="SELECT id,CONCAT(nombre, ' ',apellido_pat) as nombreusuario,telefono,correo,estatus from paciente where estatus=1";

    return $consulta;           

    }
   

    public function agregar(Request $request){
            $idPaciente=$request->id;
            $archivoName=$request->file;
            $nomArchivo=$archivoName->getClientOriginalName();

            $archivo=new Archivo;
            $archivo->nombre=$nomArchivo;
            $archivo->id_paciente=$idPaciente;
            $archivo->save();
 
             $nombre = $nomArchivo;
             $path = 'archivo_paciente';
             $archivoName->move($path,$nombre);

      $archivos = Archivo::select('*')->where('id_paciente',$idPaciente)->get();
   
    
      return view('admin.paciente.lista')->with('archivos',$archivos)->render();
       
  

}

public function archivo($id){

    
    //$archivos = Archivo::where('id_paciente',$id)->get();
     $paciente = Paciente::where('id',$id)->get();
      $archivos = Archivo::where('id_paciente',$id)->get();
     // view('admin.paciente.lista')->with('pacientes',$paciente)->wi//th('archivos',$archivos)->render();
    
    return view('admin.paciente.archivos')->with('pacientes',$paciente)->with('archivos',$archivos)->render(); 
}

public function eliminarArchivo(Request $request,$archivo){
$idp=$request->id;
 
$documento=Archivo::where('nombre',$archivo)->delete();

   unlink('archivo_paciente/'.$archivo);

     $archivos = Archivo::select('*')->where('id_paciente',$idp)->get();
      return view('admin.paciente.lista')->with('archivos',$archivos)->render();
   

}

public function eliminar($id,$nombre){

    Archivo::where('nombre','=',$nombre,'and','id_paciente','=',$id)->delete();
       unlink('archivo_paciente/'.$nombre); 

      $archivos = Archivo::select('*')->where('id_paciente',$id)->get();
   
    
      return view('admin.paciente.lista')->with('archivos',$archivos)->render();

}

public function verReceta($id){

return view('admin.paciente.receta');

}

public function abrirPaciente(){

return view('admin.paciente.index');

}


}
 