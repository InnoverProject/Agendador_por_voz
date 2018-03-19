<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Medico;
use App\Perfil;
use App\Paciente;
use App\Clinica;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;


class UsuarioController extends Controller
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
        return view('admin.usuario.index')->with('color',$color);
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
                $usuario=new User;

          try {

            if ($request->contrasena != '') {
                $usuario->password = bcrypt($request->contrasena);
                //$user->password_recharge = Crypt::encrypt($request->password);
            }

        $usuario->nombre=$request->usuario;
        if ($request->medicoId!="") {
        $usuario->id_medico=$request->medicoId;
        
        }else{
        $usuario->id_medico=0;    
        }
        
        $usuario->id_perfil=$request->perfilId;
        if ($request->pacienteId!="") {
        $usuario->id_paciente=$request->pacienteId;    
        }else{
        $usuario->id_paciente=0;    
        }
        
        $usuario->save();
        echo $usuario->id;
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
        $medico=Medico::select('*')->orderBy('nombre','asc')->get();
        $perfil=Perfil::select('*')->orderBy('nombre','asc')->get(); 
        $paciente=Paciente::select('*')->orderBy('nombre','asc')->get();
        if ($id==0) {
           
        return view('admin.usuario.agregar')->with('medicos',$medico)->with('perfiles',$perfil)->with('pacientes',$paciente)->render();
    }
    if ($id>0) {
        $usuario=User::select('*')->where('id',$id)->orderBy('nombre','asc')->get();
        return view('admin.usuario.editar')->with('perfiles',$perfil)->with('usuarios',$usuario)->render();   
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
        $usuario = User::findOrFail($request->id);

         try {

            if ($request->contrasena != '') {
                $usuario->password = bcrypt($request->contrasena);
                //$user->password_recharge = Crypt::encrypt($request->password);
            }

        $usuario->nombre=$request->usuario;
        $usuario->id_medico=$request->medicoId;
        $usuario->id_perfil=$request->perfilId;
        $usuario->save();
        echo $usuario->id;
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
            $user = User::find($id);
            $user->delete();
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

    public function grid(Request $request){

       if ($request->ajax()) {

        ### Recibimos los parámetros de paginación y ordenamiento.

        if(isset($request->page) != ""){ $page = $request->page; }
        if(isset($request->sortname) != ""){ $sortname = $request->sortname; }
        if(isset($request->sortorder) != ""){ $sortorder = $request->sortorder; }
        if(isset($request->rp) != ""){ $rp = $request->rp; }

 


            $usuario = DB::select($this->consultaUsuarios());
           // $archivo = DB::select($this->archivos(6));
            $total_records = count($usuario);
            $paginas = ceil($total_records / $rp);

            if($page > $paginas)
                $page = 1;

            $offset = ($page - 1) * $rp;

         
            

            //$editar = $this->tienePermiso('EDITAR_AREA');
        
            $usuarios = $usuario;

//            dd($users);
            
            $data = array();
            $data['page'] = $page;
            $data['total'] = $total_records;
            $data['rows'] = array();
            foreach ($usuarios as $usuario) {

                     $data['rows'][] = array(
                        'id' => $usuario->id,
                        'cell' => array(
                                $usuario->nombreusuario,
                                $usuario->nombreperfil,
                                '<a onclick="agregar('.$usuario->id.')" class="btn btn-sm btn-warning" title="Editar"><span><i class="fa fa-edit fa-2x"></i></span></a>'." ".
                                    '<a onclick="eliminar('.$usuario->id.')" class="btn btn-sm btn-danger" title="Eliminar"><span><i class="fa fa-times fa-2x"></i></span></a>'
                                ) 
                    ); # code...
                 
              
            }


            echo json_encode($data);
        }


    } 

    public function consultaUsuarios(){

    $consulta="SELECT u.id,CONCAT(m.nombre, ' ', m.apellido_pat) as nombreusuario,p.nombre as       nombreperfil 
               from medico m
               join users u
               on u.id_medico=m.id
               join perfil p 
               on p.id=u.id_perfil";

    return $consulta;           

    }

   

}
