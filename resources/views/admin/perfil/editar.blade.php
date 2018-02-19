<form id="frmPerfil" class="form-horizontal" role="form" action="{{ url('profile/update') }}" method="POST" accept-charset="utf-8">
    {{ csrf_field() }}

    <div class="row form-group">
        
    </div>
    <div class="row form-group">
        <label class="control-label col-xs-2" align="">Nombre</label>
        <div class="col-xs-4">
            <input type="text" name="nombre" id="nombre" class="form-control input-sm required" value="{{$perfiles->nombre}}" maxlength="255" placeholder="">
        </div>
        <label class="control-label col-xs-2 class=" class=""  >Rol</label>
        <div class="col-xs-4">
            <input type="text" name="rol" id="rol" class="form-control input-sm required" value="{{$perfiles->rol}}" maxlength="255" placeholder="">
        </div>
    </div>
    
    </div>
    <table id="Sistema" class="table table-striped table-bordered table-hover table-condensed">
  <div class="col-xs-12 text-center">
   <a onclick="selecciona('Sistema');" class="btn btn-default">Selecciona todos</a>
   <a onclick="deselecciona('Sistema');" class="btn btn-default">Deselecciona todos</a>
  </div>
   <thead>
    <th>M&oacute;dulo</th>
    <th width="100">Ver</th>
    <th width="100">Agregar</th>
    <th width="100">Editar</th>
    <th width="100">Eliminar</th>
    <th width="100">Importar/Exportar</th>
    <th width="100">Permisos</th>
   </thead>
         
   <tbody>
    <tr>
     <td>Usuarios</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_USUARIO" {{ (in_array("VER_USUARIO",$permisos))?"checked":""}} /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_USUARIO" {{ (in_array("AGREGAR_USUARIO",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_USUARIO" {{ (in_array("EDITAR_USUARIO",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_USUARIO" {{ (in_array("ELIMINAR_USUARIO",$permisos))?"checked":""}}/></td>
     <td align="center">&nbsp;</td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Perfiles</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_PERFIL" {{ (in_array("VER_PERFIL",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_PERFIL" {{ (in_array("AGREGAR_PERFIL",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_PERFIL" {{ (in_array("EDITAR_PERFIL",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_PERFIL" {{ (in_array("ELIMINAR_PERFIL",$permisos))?"checked":""}}/></td>
     <td align="center"></td>
     <td align="center"></td>
    </tr>
     <td>Médicos</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_MEDICO" {{ (in_array("VER_MEDICO",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_MEDICO" {{ (in_array("AGREGAR_MEDICO",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_MEDICO" {{ (in_array("EDITAR_MEDICO",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_MEDICO" {{ (in_array("ELIMINAR_MEDICO",$permisos))?"checked":""}}/></td>
     <td align="center"></td>
     <td align="center"></td>
    </tr>
    <tr>
     <td>Especialidades</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_ESPECIALIDAD" {{ (in_array("VER_ESPECIALIDAD",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_ESPECIALIDAD" {{ (in_array("AGREGAR_ESPECIALIDAD",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_ESPECIALIDAD" {{ (in_array("EDITAR_ESPECIALIDAD",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_ESPECIALIDAD" {{ (in_array("ELIMINAR_ESPECIALIDAD",$permisos))?"checked":""}}/></td>
     <td align="center"></td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Acciones</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_ACCIONES" {{ (in_array("VER_ACCIONES",$permisos))?"checked":""}}/></td>
     <td align="center"></td>
     <td align="center"></td>
     <td align="center"></td>
     <td align="center"></td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Pacientes</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_PACIENTE" {{ (in_array("VER_PACIENTE",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_PACIENTE" {{ (in_array("AGREGAR_PACIENTE",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_PACIENTE" {{ (in_array("EDITAR_PACIENTE",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_PACIENTE" {{ (in_array("ELIMINAR_PACIENTE",$permisos))?"checked":""}}/></td>
     <td align="center">&nbsp;</td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Agenda</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_AGENDA" {{ (in_array("VER_AGENDA",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_AGENDA" {{ (in_array("AGREGAR_AGENDA",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_AGENDA" {{ (in_array("EDITAR_AGENDA",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_AGENDA" {{ (in_array("ELIMINAR_AGENDA",$permisos))?"checked":""}}/></td>
     <td align="center">&nbsp;</td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Parfil médico</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_PERFIL_MEDICO" {{ (in_array("VER_PERFIL_MEDICO",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_PERFIL_MEDICO" {{ (in_array("AGREGAR_PERFIL_MEDICO",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_PERFIL_MEDICO" {{ (in_array("EDITAR_PERFIL_MEDICO",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_PERFIL_MEDICO" /></td>
     <td align="center">&nbsp;</td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Clínica</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_CLINICA" {{ (in_array("VER_CLINICA",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_CLINICA" {{ (in_array("AGREGAR_CLINICA",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_CLINICA" {{ (in_array("EDITAR_CLINICA",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_CLINICA" {{ (in_array("ELIMINAR_CLINICA",$permisos))?"checked":""}}/></td>
     <td align="center">&nbsp;</td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Evaluación</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_EVALUACION" {{ (in_array("VER_EVALUACION",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_EVALUACION" {{ (in_array("AGREGAR_EVALUACION",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_EVALUACION" {{ (in_array("EDITAR_EVALUACION",$permisos))?"checked":""}}/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_EVALUACION" {{ (in_array("ELIMINAR_EVALUACION",$permisos))?"checked":""}}/></td>
     <td align="center">&nbsp;</td>
     <td align="center">&nbsp;</td>
    </tr>
    
   </tbody>
  </table>
    <input type="hidden" name="id" value="{{$perfiles->id}}">
</form>
