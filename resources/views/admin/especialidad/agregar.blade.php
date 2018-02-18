<form id="frmEspecialidadRegistro" class="form-horizontal" role="form" action="{{ url('especial/store') }}" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}


<div class="row">
    <div class="col">
    <label class="control-label col-xs-2" style="font-family: sans-serif;">Nombre</label>
      <input type="text" name="nombre" id="nombre" class="form-control required">
    </div>
    <div class="col">
      <label class="control-label col-xs-2" style="font-family: sans-serif;">Descripciòn</label>
      <input type="text" name="desc" id="desc" class="form-control required">

    </div>
  </div>
  <br>
<div class="row">
    <div class="col">
  
    </div>
    <div class="col">
   <select name="estatus" id="estatus" class="form-control input-sm required">
        <option value="" selected>Seleccione estatus</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
        
      </select>
    </div>
  </div>

<div class="alert alert-warning hide" id="alertcontra">
    <strong>Alerta!</strong> Las contraseñas no coinciden.
  </div>

</form>