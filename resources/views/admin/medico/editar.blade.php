<form id="frmMedicoRegistro" class="form-horizontal" role="form" action="{{ url('doctor/update') }}" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}
@foreach($medicos as $medico)
 <div class="col-md-12 col-md-offset-6"  style="overflow: auto; width: 100%; max-height: 1000px; overflow-x: hidden;  height: 370px;">
   <div class="input-group">
  
  <input type="text" class="form-control" name="nom" id="nom" placeholder="Nombre" value="{{$medico->nombre}}">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="ape_pat" id="ape_pat" placeholder="Apellido paterno" value="{{$medico->apellido_pat}}">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="ape_mat" id="ape_mat" placeholder="Apellido materno" value="{{$medico->apellido_mat}}">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="dir" id="dir" placeholder="Dirección" value="{{$medico->direccion}}">
</div>
<br>
<div class="input-group">
 <select name="edad" id="edad" class="form-control input-sm required">
        <option value="{{$medico->edad}}" selected>{{$medico->edad}}</option>
        @for($i=1;$i<60;$i++)
          <option value="{{$i}}">{{$i}}</option>
        @endfor
        
      </select>
</div>
<br>
<div class="input-group">
  
  <select name="sex" id="sex" class="form-control input-sm required">
        <option value="{{$medico->sexo}}" selected>{{$medico->sexo}}</option>
        <option value="Femenino">Femenino</option>
        <option value="Masculino">Masculino</option>
        
      </select>
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="tel" id="tel" placeholder="Teléfono" value="{{$medico->telefono}}">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="mail" class="form-control" name="correo" id="correo" placeholder="Correo" value="{{$medico->correo}}">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="entrada" id="entada" placeholder="Hora de entrada" value="{{$medico->hra_entrada}}">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="salida" id="salida" placeholder="Hora de salida" value="{{$medico->hra_salida}}">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="ced" id="ced" placeholder="Cédula" value="{{$medico->cedula}}">
</div>
<br>
<div class="input-group">
  
    {{(($medico->estatus==1)?'Activo':'' )}}
</div>
<br>
<div class="input-group">
  @foreach($especialidades as $especialidad)
  <select name="especialidad" id="especialidad" class="form-control input-sm required">
        <option value="{{$medico->id_especialidad}}" selected>{{$medico->especialidad->nombre}}</option>
        <option value="{{$especialidad->id}}">{{$especialidad->nombre}}</option>
        
      </select>
  @endforeach
  
</div>

 </div>

 <input type="hidden" name="id" id="id" value="{{$medico->id}}">
@endforeach


<div class="alert alert-warning hide" id="alertcontra">
    <strong>Alerta!</strong> Las contraseñas no coinciden.
  </div>

</form>