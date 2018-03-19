<form id="frmConsulta" class="form-horizontal" role="form" action="{{ url('consulta/store') }}" method="POST" accept-charset="utf-8"> 
  {{ csrf_field() }}
@foreach($pacientes as $paciente)
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{$paciente->nombre}}">
  </div>
   <div class="form-group">
    <label for="ape_pat">Apellido paterno</label>
    <input type="text" class="form-control" id="ape_pat" name="ape_pat" placeholder="Apellido paterno" value="{{$paciente->apellido_pat}}">
  </div>
   <div class="form-group">
    <label for="ape_mat">Apellido materno</label>
    <input type="text" class="form-control" id="ape_mat" name="ape_mat" placeholder="Apellido materno" value="{{$paciente->apellido_mat}}">
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Edad</label>
    <select name="edad" id="edad" class="form-control input-sm required">
        <option value="{{$paciente->edad}}" selected>{{$paciente->edad}}</option>
        @for($i=1;$i<60;$i++)
          <option value="{{$i}}">{{$i}}</option>
        @endfor
        
      </select>
  </div> 
   <div class="form-group">
    <label for="talla">Talla</label>
    <input type="text" class="form-control" id="talla" name="talla" placeholder="Talla">
  </div>
   <div class="form-group">
    <label for="peso">Peso actual</label>
    <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso actual">
  </div>
  <div class="form-group">
    <label for="consulta_por">Consulta por</label>
    <textarea class="form-control" id="consulta_por" name="consulta_por" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="examen_fisico">Exámen físico</label>
    <textarea class="form-control" id="examen_fisico" name="examen_fisico" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="examen_laboratorio">Exámenes de laboratorio</label>
    <textarea class="form-control" id="examen_laboratorio" name="examen_laboratorio" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="diagnostico">Diagnóstico</label>
    <textarea class="form-control" id="diagnostico" name="diagnostico" rows="3"></textarea>
  </div>

  <input type="hidden" name="id" id="id" value="{{$paciente->id}}">
  @endforeach
</form>