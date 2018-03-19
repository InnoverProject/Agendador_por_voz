<form id="frmReceta" class="form-horizontal" role="form" action="{{ url('receta/store') }}" method="POST" accept-charset="utf-8">
    {{ csrf_field() }}
@foreach($pacientes as $paciente) 
    <div class="row"> 
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Receta médica</legend>
                        <div class="row">
                            <div class="col-md-5">
                                <img src="" class="img-responsive" style="height: 200px;width: 200px;">
                            </div>
                            <div class="col-md-7">
                                @foreach($perfiles as $perfil)
                    <textarea class="form-control" id="message" name="message" placeholder="datos de la medico nombre,especialidad,casa de estudio y cedula pro" rows="7">
            Nombre del médico: {{$paciente->medico->nombre}} {{$paciente->medico->apellido_pat}} 
            Especialidad: {{$paciente->medico->especialidad->nombre}} 
            Casa de estudio: {{$perfil->casa_estudio}} 
            Cédula profesional: {{$perfil->cedula}}</textarea>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-12">
                                <textarea class="form-control" id="message" name="message" placeholder="indicaciones medicas." rows="7"></textarea>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-10">
                               <input id="lname" name="name" type="text" placeholder="nombre del paciente" class="form-control" value="{{$paciente->nombre}} {{$paciente->apellido_pat}}">
                            </div>
                            <div class="col-md-2">
                              <input id="name" name="name" type="text" placeholder="edad" class="form-control" value="{{$paciente->edad}}">
                            </div>
                        </div>
                         <br>
                         <div class="row">
                            <div class="col-md-5">
                              <input id="fecha" name="fecha" type="text" placeholder="fecha" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                              <input id="phone" name="phone" type="text" placeholder="direccion de clinica,telefono y pagina web" class="form-control" value="Dirección: {{$paciente->clinica[0]->direccion}} Teléfono: {{$paciente->clinica[0]->telefono}} Correo: {{$paciente->clinica[0]->email}}">
                            </div>
                        </div>          
                    </fieldset>
                </form>
            </div>
        </div>
        <input type="hidden" name="id" id="id" value="{{$paciente->id}}">
    </div>
@endforeach    
</form>
