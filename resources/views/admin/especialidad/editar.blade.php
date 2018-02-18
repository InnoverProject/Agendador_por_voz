 <form id="frmEspecialidadRegistro" class="form-horizontal" role="form" action="{{ url('especial/update') }}" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

@foreach($especialidades as $especialidad)
<div class="row">
    <div class="col">
    <label class="control-label col-xs-2" style="font-family: sans-serif;">Nombre</label>
      <input type="text" name="nombre" id="nombre" class="form-control required" value="{{$especialidad->nombre}}">
    </div>
    <div class="col">
      <label class="control-label col-xs-2" style="font-family: sans-serif;">Descripciòn</label>
      <input type="text" name="desc" id="desc" class="form-control required" value="{{$especialidad->descripcion}}">  
    </div>
  </div>
  <br>
<div class="row">
    <div class="col">
  
    </div>
    <div class="col">
   <select name="estatus" id="estatus" class="form-control input-sm required">
        <option value="{{$especialidad->estatus}}" selected>{{(($especialidad->estatus==1)? 'Activo':'Inactivo')}}</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
        
      </select>
    </div>
  </div>
 <input type="hidden" name="id" id="id" value="{{$especialidad->id}}">
<div class="alert alert-warning hide" id="alertcontra">
    <strong>Alerta!</strong> Las contraseñas no coinciden.
  </div>

</form>
@endforeach