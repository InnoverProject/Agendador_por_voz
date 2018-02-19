<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidad;

//use App\Perfil;
use Illuminate\Support\Facades\DB;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.especialidad.index');
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
         $especialidad=new Especialidad;

          try {


        $especialidad->nombre=$request->nombre;
        $especialidad->descripcion=$request->desc;
        $especialidad->estatus=$request->estatus;
        $especialidad->save();
        echo $especialidad->id;
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
        
        //$perfil=Perfil::select('*')->orderBy('nombre','asc')->get(); 
        if ($id==0) {
           
        return view('admin.especialidad.agregar')->render();
    }
    if ($id>0) {
        $especialidad=Especialidad::where('id',$id)->get();
         return view('admin.especialidad.editar')->with('especialidades',$especialidad)->render();   
    }
    }

    
    public function grid(Request $request){

       if ($request->ajax()) {

        ### Recibimos los parámetros de paginación y ordenamiento.

        if(isset($request->page) != ""){ $page = $request->page; }
        if(isset($request->sortname) != ""){ $sortname = $request->sortname; }
        if(isset($request->sortorder) != ""){ $sortorder = $request->sortorder; }
        if(isset($request->rp) != ""){ $rp = $request->rp; }

 


            $especialidad = DB::select($this->consultaUsuarios());
           // $archivo = DB::select($this->archivos(6));
            $total_records = count($especialidad);
            $paginas = ceil($total_records / $rp);

            if($page > $paginas)
                $page = 1;

            $offset = ($page - 1) * $rp;

         
            

            //$editar = $this->tienePermiso('EDITAR_AREA');
        
            $especialidades = $especialidad;

//            dd($users);
            
            $data = array();
            $data['page'] = $page;
            $data['total'] = $total_records;
            $data['rows'] = array();
            foreach ($especialidades as $especialidad) { 

                     $data['rows'][] = array(
                        'id' => $especialidad->id,
                        'cell' => array(
                                $especialidad->nombre,
                                $especialidad->descripcion,
                                (($especialidad->estatus==1)? 'Activo' : 'Inactivo'),
                                '<a onclick="agregar('.$especialidad->id.')" class="btn btn-sm btn-warning" title="Editar"><span><i class="fa fa-pencil"></i></span></a>'.
                               
                                    //Eliminar
                                    '<a onclick="eliminar('.$especialidad->id.')" class="btn btn-sm btn-danger" title="Eliminar"><span><i class="fa fa-times"></i></span></a>'
                                )
                    ); # code...
                 
              
            }


            echo json_encode($data);
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
        $especialidad= Especialidad::findOrFail($request->id);

         try { 
        
        $especialidad->nombre=$request->nombre;
        $especialidad->descripcion=$request->desc;
        $especialidad->estatus=$request->estatus;
        $especialidad->save();
        echo $especialidad->id;
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
          $especialidad = Especialidad::find($id);
        try {
            $especialidad->delete();
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

    $consulta="SELECT * from especialidad where estatus=1";

    return $consulta;           

    }
}
