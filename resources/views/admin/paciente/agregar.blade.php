 <form id="frmPacienteRegistro" class="form-horizontal" role="form" action="{{ url('patient/store') }}" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

 <div class="col-md-12 col-md-offset-6"  style="overflow: auto; width: 100%; max-height: 1000px; overflow-x: hidden;  height: 370px;">
   <div class="input-group">
   
  <input type="text" class="form-control" name="nom" id="nom" placeholder="Nombre">
</div>
<br> 
<div class="input-group">
  
  <input type="text" class="form-control" name="ape_pat" id="ape_pat" placeholder="Apellido paterno">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="ape_mat" id="ape_mat" placeholder="Apellido materno">
</div>
<br> 
<div class="input-group">
  
  <input type="text" class="form-control" name="dir" id="dir" placeholder="Dirección">
</div>
<br>
<div class="input-group">
 <select name="edad" id="edad" class="form-control input-sm required">
        <option value="" selected>Edad</option>
        @for($i=1;$i<60;$i++)
          <option value="{{$i}}">{{$i}}</option>
        @endfor
        
      </select>
</div>
<br>
<div class="input-group">
  
  <select name="sex" id="sex" class="form-control input-sm required">
        <option value="" selected>Sexo</option>
        <option value="Femenino">Femenino</option>
        <option value="Masculino">Masculino</option>
        
      </select>
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="tel" id="tel" placeholder="Teléfono">
</div>


<br>

<br>
<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="mail" class="form-control" name="correo" id="correo" placeholder="Correo">
</div>




<br>

<div class="input-group">
  
  <input type="text" class="form-control" name="fecha" id="fecha" placeholder="Fecha">
</div>

<br>
<div class="input-group">  
      <select name="estatus_id" id="estatus_id" class="form-control input-sm required">
        <option value="" selected>Seleccione estatus</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
        
      </select>
    </div>
    <br>
<div class="input-group">
  
  <select name="medico" id="medico" class="form-control input-sm required">
  
        <option value="" selected>Médico</option>
        @foreach($medicos as $medico)
        <option value="{{$medico->id}}">{{$medico->nombre}} {{$medico->apellido_pat}}</option>
         @endforeach
      </select>
 
  
</div>

 </div>



<div class="alert alert-warning hide" id="alertcontra">
    <strong>Alerta!</strong> Las contraseñas no coinciden.
  </div>

</form>