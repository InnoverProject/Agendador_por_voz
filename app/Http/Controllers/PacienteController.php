<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Medico;
//use App\Perfil;
use Illuminate\Support\Facades\DB;

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


        $paciente->nombre=$request->usuario;
        $paciente->apellido_pat=$request->medicoId;
        $paciente->apellido_mat=$request->perfilId;
        $paciente->direccion=$request->perfilId;
        $paciente->edad=$request->perfilId;
        $paciente->sexo=$request->perfilId;
        $paciente->estatura_mat=$request->perfilId;
        $paciente->tipo_sangre=$request->perfilId;
        $paciente->telefono=$request->perfilId;
        $paciente->correo=$request->perfilId;
        $paciente->estatus=$request->perfilId;
        $paciente->id_medico=$request->perfilId;
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
         $medicos=Medico::select('*')->where('estatus',1)->get();
        //$perfil=Perfil::select('*')->orderBy('nombre','asc')->get(); 
        if ($id==0) {
           
        return view('admin.paciente.agregar')->with('medicos',$medicos)->render();
    }
    if ($id>0) {
         $pacientes=Paciente::select('*')->where('id',$id)->orderBy('nombre','asc')->get();
         return view('admin.paciente.editar')->with('pacientes',$pacientes)->render();   
    }
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

    public function consultaUsuarios(){

    $consulta="SELECT id,CONCAT(nombre, ' ',apellido_pat) as nombreusuario,telefono,correo,estatus from paciente where estatus=1";

    return $consulta;           

    }
}
 