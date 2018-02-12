<form id="frmUsuarioRegistro" class="form-horizontal" role="form" action="{{ url('users/store') }}" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}
<div class="row">
    <div class="col">
    <label class="control-label col-xs-2" style="font-family: sans-serif;">Seleccione un médico</label>
      <select name="medicoId" id="medicoId" class="form-control input-sm required">
				<option value="" selected>médicos</option>
				@foreach ($medicos as $medico)
					<option value="{{$medico->id}}">{{$medico->nombre}} {{$medico->apellido_pat}}</option>
				@endforeach
			</select>
    </div>
    <div class="col">
      <label class="control-label col-xs-2" style="font-family: sans-serif;">Seleccione un perfil</label>
       <select name="perfilId" id="perfilId" class="form-control input-sm required">
				<option value="" selected>perfiles</option>
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
      <input type="text" name="usuario" id="usuario" class="form-control required">
    </div>
    <div class="col">
      <label class="control-label col-xs-2" style="font-family: sans-serif;">Contraseña</label>
      <input type="password" name="contrasena" id="contrasena" class="form-control required">

    </div>
  </div>
  <br>
<div class="row">
    <div class="col">
  
    </div>
    <div class="col">
      <label class="control-label col-xs-2" style="font-family: sans-serif;">Confirmar contraseña</label>
      <input type="password" name="contrasenaConf" id="contrasenaConf" class="form-control required">

    </div>
  </div>

<div class="alert alert-warning hide" id="alertcontra">
    <strong>Alerta!</strong> Las contraseñas no coinciden.
  </div>

</form>