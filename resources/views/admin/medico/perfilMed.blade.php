 <form id="frmMedicoPerfil" class="form-horizontal" role="form" action="{{ url('perfilMed/store') }}" method="POST" accept-charset="utf-8"> 
  {{ csrf_field() }}
 
  <div class="form-group">
    <label for="cedula">Cedula</label>
    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula" value="">
  </div>
   <div class="form-group">
    <label for="casa">Casa de estudios</label>
    <input type="text" class="form-control" id="casa" name="casa" placeholder="Casa de estudios" value="">
  </div>
  <div class="form-group">
    <label for="descrip">Descripción</label>
    <textarea class="form-control" id="descrip" name="descrip" rows="3"></textarea>
  </div>
  

</form>