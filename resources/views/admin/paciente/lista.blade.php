
	   <h2>Archivos contenidos</h2>
  <ul class='list-group'>
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