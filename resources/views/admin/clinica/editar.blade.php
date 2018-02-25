<form id="frmClinicaRegistro" class="form-horizontal" role="form" action="{{ url('clinic/update') }}" method="POST" accept-charset="utf-8">
	{{ csrf_field() }}

 <div class="col-md-12"  style="overflow: auto; width: 100%; max-height: 1000px; overflow-x: hidden;  height: 370px;">
 @foreach($clinicas as $clinica)
   <img src="" class="img-responsive" style="height: 200px;width: 200px;">
 <br>
 <br>
   <input type="file" name="foto" id="foto">
   <br>
   <br>
   <div class="input-group">
 
  
  <input type="text" class="form-control" name="nom" id="nom" placeholder="Nombre" value="{{$clinica->nombre}}">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="tel" id="tel" placeholder="Teléfono" value="{{$clinica->telefono}}">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="mail" class="form-control" name="correo" id="correo" placeholder="Correo" value="{{$clinica->email}}">
</div>
<br>
<div class="input-group">
  <input type="text" class="form-control" name="iva" id="iva" placeholder="IVA%" value="{{$clinica->iva}}">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control " name="dir" id="dir" placeholder="Dirección" value="{{$clinica->direccion}}">
</div>
<br>
<div class="input-group">
  <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="ciudad" value="{{$clinica->ciudad}}">
</div>
<br>
<div class="input-group">
  <input type="text" class="form-control" name="cp" id="cp" placeholder="Codigo postal" value="{{$clinica->cod_postal}}">
</div>
<br>
<div class="input-group">
  <input type="text" class="form-control" name="region" id="region" placeholder="region" value="{{$clinica->region}}">
</div>
<br>
<div class="input-group">
  <input type="text" class="form-control" name="color" id="color" placeholder="Color" value="{{$clinica->color}}">
</div>
<br>
<div class="input-group">  
      <select name="estatus" id="estatus" class="form-control input-sm required">
        <option value="{{$clinica->estatus}}" selected>{{(($clinica->estatus==1)?'Activo':'Inactivo')}}</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
        
      </select>
    </div>
    <input type="hidden" name="id" id="id" value="{{$clinica->id}}">
    @endforeach
 </div>
 

</form>