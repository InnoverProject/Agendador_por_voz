 <form id="frmPacienteRegistro" class="form-horizontal" role="form" action="{{ url('patient/update') }}" method="POST" accept-charset="utf-8">
  {{ csrf_field() }}
@foreach($pacientes as $paciente)
 <div class="col-md-12 col-md-offset-6"  style="overflow: auto; width: 100%; max-height: 1000px; overflow-x: hidden;  height: 370px;">
   <div class="input-group">
   
  <input type="text" class="form-control" name="nom" id="nom" placeholder="Nombre" value="{{$paciente->nombre}}">
</div>
<br> 
<div class="input-group">
  
  <input type="text" class="form-control" name="ape_pat" id="ape_pat" placeholder="Apellido paterno" value="{{$paciente->apellido_pat}}">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="ape_mat" id="ape_mat" placeholder="Apellido materno" value="{{$paciente->apellido_mat}}">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="dir" id="dir" placeholder="Dirección" value="{{$paciente->direccion}}">
</div>
<br>
<div class="input-group">
 <select name="edad" id="edad" class="form-control input-sm required">
        <option value="{{$paciente->edad}}" selected>{{$paciente->edad}}</option>
        @for($i=1;$i<60;$i++)
          <option value="{{$i}}">{{$i}}</option>
        @endfor
        
      </select>
</div>
<br>
<div class="input-group">
  
  <select name="sex" id="sex" class="form-control input-sm required">
        <option value="{{$paciente->sexo}}" selected>{{$paciente->sexo}}</option>
        <option value="Femenino">Femenino</option>
        <option value="Masculino">Masculino</option>
        
      </select>
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="tel" id="tel" placeholder="Teléfono" value="{{$paciente->telefono}}">
</div>


<br>

<br>
<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="mail" class="form-control" name="correo" id="correo" placeholder="Correo" value="{{$paciente->correo}}">
</div>




<br>

<div class="input-group">
  
  <input type="text" class="form-control" name="fecha" id="fecha" placeholder="Fecha" value="{{$paciente->fecha}}">
</div>

<br>
<div class="input-group">  
      <select name="estatus_id" id="estatus_id" class="form-control input-sm required">
        <option value="{{$paciente->estatus}}" selected>{{(($paciente->estatus==1)?'Activo':'Inactivo')}}</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
        
      </select>
    </div>
    <br>
<div class="input-group">
  
  <select name="medico" id="medico" class="form-control input-sm required">
  
        <option value="{{$paciente->id_medico}}" selected>{{$paciente->medico->nombre}}</option>
        @foreach($medicos as $medico)
        <option value="{{$medico->id}}">{{$medico->nombre}} {{$medico->apellido_pat}}</option>
         @endforeach
      </select>
 
  
</div>

 </div>


<input type="hidden" name="id" id="id" value="{{$paciente->id}}">
<div class="alert alert-warning hide" id="alertcontra">
    <strong>Alerta!</strong> Las contraseñas no coinciden.
  </div>
@endforeach
</form>