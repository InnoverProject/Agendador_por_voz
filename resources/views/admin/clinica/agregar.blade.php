<form id="frmClinicaRegistro" class="form-horizontal" role="form" action="{{ url('clinic/store') }}" method="POST" accept-charset="utf-8">
	{{ csrf_field() }} 

 <div class="col-md-12"  style="overflow: auto; width: 100%; max-height: 1000px; overflow-x: hidden;  height: 370px;">
 
   <img src="" class="img-responsive" style="height: 200px;width: 200px;">
 <br>
 <br>
   <input type="file" name="foto" id="foto">
   <br>
   <br>
   <div class="input-group">
 
  
  <input type="text" class="form-control" name="nom" id="nom" placeholder="Nombre">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control" name="tel" id="tel" placeholder="Teléfono">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="mail" class="form-control" name="correo" id="correo" placeholder="Correo">
</div>
<br>
<div class="input-group">
  <input type="text" class="form-control" name="iva" id="iva" placeholder="IVA%">
</div>
<br>
<div class="input-group">
  
  <input type="text" class="form-control " name="dir" id="dir" placeholder="Dirección">
</div>
<br>
<div class="input-group">
  <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="ciudad">
</div>
<br>
<div class="input-group">
  <input type="text" class="form-control" name="cp" id="cp" placeholder="Codigo postal">
</div>
<br>
<div class="input-group">
  <input type="text" class="form-control" name="region" id="region" placeholder="region">
</div>
<br>
<div class="input-group">
  <input type="text" id="color" class="btn btn-primary">
  <input type="hidden" class="form-control" name="colorE" id="colorE" placeholder="Color" value="">
</div>
<br>
<div class="input-group">  
      <select name="estatus" id="estatus" class="form-control input-sm required">
        <option value="" selected>Seleccione estatus</option>
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
        
      </select>
    </div>
 </div>
 <input type="hidden" name="id" id="id" value="">

</form>