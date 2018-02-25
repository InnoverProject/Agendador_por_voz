<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Clinica;

//use App\Perfil;
use Illuminate\Support\Facades\DB; 

class ClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.clinica.index');
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $clinica=new Clinica;

          try {


        $clinica->nombre=$request->nom;
        $clinica->telefono=$request->tel;
        $clinica->email=$request->correo;
        $clinica->iva=$request->iva;
        $clinica->direccion=$request->dir;
        $clinica->ciudad=$request->ciudad;
        $clinica->region=$request->region;
        $clinica->cod_postal=$request->cp;
        $clinica->color=$request->color;
        $clinica->estatus=$request->estatus;
        $clinica->save();
        echo $clinica->id;
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

 


            $clinica = DB::select($this->consultaUsuarios());
           // $archivo = DB::select($this->archivos(6));
            $total_records = count($clinica);
            $paginas = ceil($total_records / $rp);

            if($page > $paginas)
                $page = 1;

            $offset = ($page - 1) * $rp;

         
            

            //$editar = $this->tienePermiso('EDITAR_AREA');
        
            $clinicas = $clinica;

//            dd($users);
             
            $data = array();
            $data['page'] = $page;
            $data['total'] = $total_records;
            $data['rows'] = array();
            foreach ($clinicas as $clinica) { 

                     $data['rows'][] = array(
                        'id' => $clinica->id,
                        'cell' => array(
                                $clinica->nombre,
                                $clinica->telefono,
                                $clinica->email,
                                $clinica->direccion,
                                (($clinica->estatus==1)? 'Activo' : 'Inactivo'),
                                '<a onclick="agregar('.$clinica->id.')" class="btn btn-sm btn-warning" title="Editar"><span><i class="fa fa-pencil"></i></span></a>'.
                               
                                    //Eliminar
                                    '<a onclick="eliminar('.$clinica->id.')" class="btn btn-sm btn-danger" title="Eliminar"><span><i class="fa fa-times"></i></span></a>'
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
           
        return view('admin.clinica.agregar')->render();
    }
    if ($id>0) {
         $clinica=Clinica::where('id',$id)->get();
         return view('admin.clinica.editar')->with('clinicas',$clinica)->render();   
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
         $clinica=Clinica::findOrFail($request->id);

          try {


        $clinica->nombre=$request->nom;
        $clinica->telefono=$request->tel;
        $clinica->email=$request->correo;
        $clinica->iva=$request->iva;
        $clinica->direccion=$request->dir;
        $clinica->ciudad=$request->ciudad;
        $clinica->region=$request->region;
        $clinica->cod_postal=$request->cp;
        $clinica->color=$request->color;
        $clinica->estatus=$request->estatus;
        $clinica->save();
        echo $clinica->id; 
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
            $clinica = Clinica::find($id);
            $clinica->delete();
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

    $consulta="SELECT * from clinica where estatus=1";

    return $consulta;           

    }
}
