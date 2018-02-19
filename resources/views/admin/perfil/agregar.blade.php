<form id="frmPerfil" class="form-horizontal" role="form" action="{{ url('profile/store') }}" method="POST" accept-charset="utf-8">
    {{ csrf_field() }}

	<div class="row form-group">
		
	</div>
	<div class="row form-group">
		<label class="control-label col-xs-2" align="">Nombre</label>
		<div class="col-xs-4">
			<input type="text" name="nombre" id="nombre" class="form-control input-sm required" value="" maxlength="255" placeholder="">
		</div>
		<label class="control-label col-xs-2 class=" class=""  >Rol</label>
		<div class="col-xs-4">
			<input type="text" name="rol" id="rol" class="form-control input-sm required" value="" maxlength="255" placeholder="">
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
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_USUARIO" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_USUARIO" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_USUARIO" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_USUARIO" /></td>
     <td align="center">&nbsp;</td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Perfiles</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_PERFIL" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_PERFIL" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_PERFIL" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_PERFIL" /></td>
     <td align="center"></td>
     <td align="center"></td>
    </tr>
     <td>Médicos</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_MEDICO" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_MEDICO" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_MEDICO" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_MEDICO" /></td>
     <td align="center"></td>
     <td align="center"></td>
    </tr>
    <tr>
     <td>Especialidades</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_ESPECIALIDAD" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_ESPECIALIDAD" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_ESPECIALIDAD" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_ESPECIALIDAD" /></td>
     <td align="center"></td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Acciones</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_ACCIONES" /></td>
     <td align="center"></td>
     <td align="center"></td>
     <td align="center"></td>
     <td align="center"></td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Pacientes</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_PACIENTE" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_PACIENTE" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_PACIENTE" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_PACIENTE" /></td>
     <td align="center">&nbsp;</td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Agenda</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_AGENDA" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_AGENDA" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_AGENDA" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_AGENDA" /></td>
     <td align="center">&nbsp;</td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Parfil médico</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_PERFIL_MEDICO" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_PERFIL_MEDICO"/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_PERFIL_MEDICO" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_PERFIL_MEDICO" /></td>
     <td align="center">&nbsp;</td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Clínica</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_CLINICA" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_CLINICA" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_CLINICA" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_CLINICA" /></td>
     <td align="center">&nbsp;</td>
     <td align="center">&nbsp;</td>
    </tr>
    <tr>
     <td>Evaluación</td>
     <td align="center"><input type="checkbox" name="permisos[]" value="VER_EVALUACION" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="AGREGAR_EVALUACION" /></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="EDITAR_EVALUACION"/></td>
     <td align="center"><input type="checkbox" name="permisos[]" value="ELIMINAR_EVALUACION" /></td>
     <td align="center">&nbsp;</td>
     <td align="center">&nbsp;</td>
    </tr>
    
   </tbody>
  </table>
	<input type="hidden" name="id" value="">
</form>
