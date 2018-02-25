
<div class="col-md-12">
	 {{ csrf_field() }}
	
	     <div id="dropzone" class="dropzone">
		@foreach($pacientes as $paciente)
		<input type="hidden" name="id" id="id" value="{{$paciente->id}}">
		@endforeach
	 </div>
	 
</div>
<div class="col-md-12" id="list">
	   
  <ul class='list-group'>
  	<h2>Archivos contenidos</h2>
@foreach($archivos as $archivo)
<li class='list-group-item'>
	<div class="col-md-12">
		  <div class="row">
	 <div class="col-md-8">
	 	<a href="archivo_paciente/{{$archivo->nombre}}"><strong>{{$archivo->nombre}}</strong><a/>
	 </div>
	  <div class="col-md-4 text-right">
	  	<a  onclick="eliminarFile({{$archivo->id_paciente}},'{{$archivo->nombre}}')" class="btn btn-sm btn-danger "><span><i class="fa fa-times"></i></span></a></a>
	  </div>
</div>
	</div>
	
    </li>
     <input type="hidden" name="individual"  id="individual{{$archivo->id}}" value="{{$archivo->nombre}}">
@endforeach
   </ul> 
</div>