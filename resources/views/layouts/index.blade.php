<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title >SmartAgenda</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="plantilla/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="plantilla/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="{{ asset('css/flexigridcss/flexigrid.css?'.time()) }}" rel="stylesheet">

    
    <link href="{{ asset('css/estilosPropios/estiloModal.css?'.time()) }}" rel="stylesheet">

    <link href="{{ asset('js/dropzone/dropzone.css?'.time()) }}" rel="stylesheet">
     <link href="{{ asset('js/fullcalendar/fullcalendar.css?'.time()) }}" rel="stylesheet">

     

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div> 
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light " id="superior" style="background-color: {{$color}};">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header" id="logo" style="background-color: {{$color}};">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo.png" alt="homepage" class="dark-logo" />
                            
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span style="color:#4f57f5;">
                            <!-- dark Logo text -->
                           SmartAgenda
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                @yield('controles')
                 

                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                      
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">


                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="color: white">
                                    {{ Auth::user()->nombre }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" >
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" id="side" style="background-color: {{$color}};">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" >
                        <li>

                            <a href="index.html" class="waves-effect" id="menu" style="background-color: {{$color}};"><i class="fa fa-home m-r-10" aria-hidden="true"></i></i>Home</a>
                  
                        </li>
                        @if(tienePermiso('VER_USUARIO'))
                        <li>

                            <a href="{{url('/users')}}" class="waves-effect" id="menu2" style="background-color: {{$color}};"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Usuarios</a>
                        </li>
                        @else

                        @endif
                        @if(tienePermiso('VER_MEDICO'))

                        <li>
                            <a href="{{url('/doctor')}}" class="waves-effect" id="menu3" style="background-color: {{$color}};"><i class="fas fa-user-md m-r-10"></i>Médicos</a>
                        </li>
                        @else
                        @endif
                        @if(tienePermiso('VER_ESPECIALIDAD'))

                        <li>
                            <a href="{{url('/especial')}}" class="waves-effect" id="menu4" style="background-color: {{$color}};"><i class="fa fa-tasks m-r-10" aria-hidden="true"></i>Especialidad</a>
                        </li>
                        @else
                        @endif
                        @if(tienePermiso('VER_PACIENTE'))

                        <li>
                            <a href="{{url('patient')}}" class="waves-effect" id="menu5" style="background-color: {{$color}};"><i class="fa fa-plus-square m-r-10" aria-hidden="true"></i>Pacientes</a>
                        </li>
                        @else
                        @endif
                        @if(tienePermiso('VER_PERFIL'))

                        <li>
                            <a href="{{url('profile')}}" class="waves-effect" id="menu6" style="background-color: {{$color}};"><i class="fa fa-id-card m-r-10" aria-hidden="true"></i>Perfiles</a>
                        </li>
                        @else
                        @endif
                        @if(tienePermiso('VER_CLINICA'))
                        <li>
                            <a href="{{url('clinic')}}" class="waves-effect" id="menu7" style="background-color: {{$color}};"><i class="fas fa-hospital m-r-10"></i>Clìnica</a>
                        </li>
                         @else
                        @endif
                         @if(tienePermiso('VER_AGENDA'))
                        <li>
                            <a href="{{url('agenda')}}" class="waves-effect" id="menu8" style="background-color: {{$color}};"><i class="fa fa-address-book  m-r-10" aria-hidden="true"></i>Agenda</a>
                        </li>
                         @else
                        @endif
                       
                    </ul>

                    <div class="text-center m-t-30">
                        
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>

            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                @yield('contenido')
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <div id="tok">
        {{ csrf_field() }}
    </div>
    
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery-3.3.1.min.js" ></script>
      <script src="{{ asset('js/speech/artyom.min.js?'.time()) }}" type="text/javascript"></script>
     <script src="{{ asset('js/speech/artyomCommands.js?'.time()) }}" type="text/javascript"></script>
     <script src="{{ asset('js/moment/moment.js?'.time()) }}" type="text/javascript"></script>
     <script src="{{ asset('js/fullcalendar/fullcalendar.js?'.time()) }}" type="text/javascript"></script>
     <script src="{{ asset('js/fullcalendar/locale/es.js?'.time()) }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('js/backend_js/asistente.js?'.time()) }}" ></script>
<script type="text/javascript" src="{{ asset('js/dropzone/dropzone.js?'.time()) }}"></script>
    <script src="{{ asset('assets/plugins/jquery_validation_1_13_0/dist/jquery.validate.min.js') }}" type="text/javascript"></script>
  
      
     <script src="{{ asset('assets/plugins/jquery_form_3_18/ajaxforms.js?'.time()) }}"></script>
     <script src="{{ asset('js/fontawesome/fontawesome-all.js?'.time()) }}"></script>


    
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="plantilla/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="plantilla/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="plantilla/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="plantilla/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Flot Charts JavaScript -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="plantilla/js/flot-data.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    @yield('js')
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    
       

     <script src="{{ asset('js/flexigridjs/flexigrid.js?'.time()) }}" type="text/javascript"></script>
 
</div>



<div id="modalForm" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal titledg</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" onclick="guardar();">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="modalMensaje" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal titledg</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
      
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div id="normalModal3" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal titledg</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" onclick="guardarReceta();">Guardar</button>
         </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div id="normalModal4" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal titledg</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" onclick="guardarConsulta();">Guardar</button>
         </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div id="normalModal5" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal titledg</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" onclick="guardarPerfilMed();">Guardar</button>
         </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>



<!-- Modal -->
   
                    
        

</body>

</html>
