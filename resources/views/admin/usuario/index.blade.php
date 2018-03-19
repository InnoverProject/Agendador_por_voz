@extends('layouts.index')
@section('controles')
<div class="col-sm-1">
     <a onclick="agregar(0);">
        <img class="img-circle pull-right" id="control1" src="plantilla/imagenesControl/add.png" style="width: 50px;height: 50px;" >
     </a> 
                              
</div>
<div class="col-sm-1">
     <a onclick="startArtyom();">
        <img class="img-circle pull-right" id="control2" src="plantilla/imagenesControl/voz.png" style="width: 50px;height: 50px;" >
     </a> 
                              
</div>
                 
@endsection
@section('contenido')
@section('js')
   
<script type="text/javascript" src="{{asset('js/backend_js/usuario.js?'.time())}}"></script>

@endsection

 


                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-block">
                              <div class="row form-group">
                       
                        <div class="col-xs-3">
                            <input type="text" class="form-control input-sm" name="correo" id="correo" value="" placeholder="Nombre">
                        </div>
                        <div class="col-xs-9 text-right">
                            <a onclick="filtrar('frmUsuarioRegistro');" class="btn btn-default btn-sm"><i class="fa fa-search" aria-hidden="true"></i> Filtrar</a>
                           
                        </div>
                    </div>
                            </div>
                        </div>

                    </div>
                    <!-- Column -->
                    <!-- Column -->
                  
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- Row -->
                <div class="row ">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Usuarios</h4>
                                <div class="panel panel-info" id="">
                                    <div id="flexigrid" class="" style="font-size: 15px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- column -->
                </div>
                <!-- Row -->
                <!-- Row -->
               
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
           
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center" id="foot" style="background-color: {{$color}};">
                © 2018 Innover
            </footer>

   @endsection