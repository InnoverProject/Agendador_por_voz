<form id="frmAntecedente" class="form-horizontal" role="form" action="{{ url('antecedent/store') }}" method="POST" accept-charset="utf-8"> 
  {{ csrf_field() }}

  <div class="form-group">
    <label for="alergia">Alergias</label>
    <textarea class="form-control" id="alergia" name="alergia" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="enfermedad">Enfermedades crónicas</label>
    <textarea class="form-control" id="enfermedad" name="enfermedad" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="quirurgico">Antecedentes quirurgicos</label>
    <textarea class="form-control" id="quirurgico" name="quirurgico" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="vacuna">Vacunas</label>
    <textarea class="form-control" id="vacuna" name="vacuna" rows="3"></textarea>
  </div>
@foreach($pacientes as $paciente)
  <input type="hidden" name="id" id="id" value="{{$paciente->id}}">
  @endforeach
</form>