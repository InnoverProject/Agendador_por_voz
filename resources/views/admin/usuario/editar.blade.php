<form id="frmUsuarioRegistro" class="form-horizontal" role="form" action="{{ url('users/update') }}" method="POST" accept-charset="utf-8">
  {{ csrf_field() }}
 
	    @foreach($usuarios as $usuario)
<div class="row">
    <div class="col {{(($usuario->id_medico==0)? 'hide' :'' )}}">
    <label class="control-label col-xs-2" style="font-family: sans-serif;">Médico</label>
      <input type="hidden" name="medicoId" id="medicoId" value="{{$usuario->id_medico}}">
     <div class="col-md-4 text-center">
       {{$usuario->medico->nombre}}
     </div>
    </div>
    <div class="col {{(($usuario->id_paciente==0)? 'hide' : '')}}">
    <label class="control-label col-xs-2" style="font-family: sans-serif;">Paciente</label>
    <input type="hidden" name="pacienteId" id="pacienteId" value="{{$usuario->id_paciente}}">
     <div class="col-md-4 text-center">
    
     </div>
    </div>
    <div class="col">
      <label class="control-label col-xs-2" style="font-family: sans-serif;">Seleccione un perfil</label>
       <select name="perfilId" class="form-control input-sm required">
				<option value="" selected>{{$usuario->perfil->nombre}}</option>
				@foreach ($perfiles as $perfil)
					<option value="{{$perfil->id}}">{{$perfil->nombre}}</option>
				@endforeach
			</select>

    </div>
  </div>
<br>
<div class="row">
    <div class="col">

    <label class="control-label col-xs-2" style="font-family: sans-serif;">Usuario</label>
      <input type="text" name="usuario" id="usuario" class="form-control required" value="{{$usuario->nombre}}">
    </div>
    
    <div class="col">
      <label class="control-label col-xs-2" style="font-family: sans-serif;">Contraseña</label>
      <input type="password" name="contrasena" class="form-control required">

    </div>
  </div>
  <br>
<div class="row">
    <div class="col">
  
    </div>
    <div class="col">
      <label class="control-label col-xs-2" style="font-family: sans-serif;">Confirmar contraseña</label>
      <input type="password" name="contrasenaConf" class="form-control required">

    </div>
  </div>
<input type="hidden" name="id" id="id" value="{{$usuario->id}}">

@endforeach
</form>