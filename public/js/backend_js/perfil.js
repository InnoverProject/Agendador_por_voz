 $(document).ready(function() {
	var token = $('#tok').children().val();
 	var filtro="profile/grid?_token="+token;

    $("#flexigrid").flexigrid({
		url: filtro,
		dataType: "json",
		method: 'POST',
		colModel: [
			{display:"Nombre",  name:"nombre",  width:300, sortable: true, align:"center"},
			{display:"Rol",  name:"rol",  width:300, sortable: true, align:"center"},
			{display:"Acciones",  name:"",  width:200, sortable: false, align:"center"}
		],
		sortname: "nombreMedico"
		,sortorder: "asc"
		,usepager: true
        ,useRp: false
        ,singleSelect: true
        ,resizable: false
        ,showToggleBtn: false
        ,rp: 15 
        ,width: 400
        ,height: 380
	});
//$('#busqueda').hide();
});


function agregar(id)
{
console.log(id);

	$.ajax({
		url: 'profile/'+id+'/edit',
		type: 'GET',
		success: function(res){
			
			$("#modalForm").children().children().children().children('.modal-title').text('Agregar médico');
			$("#modalForm").children().children().children('.modal-body').html(res);
			$("#modalForm").modal('show');
 	
			//$('#perfil_id').val(perfil_id);
		}
	});


}


function guardar()
{


    $("#frmPerfil").validate({
        submitHandler: function(form){
            $(form).ajaxSubmit({
                success: function(respuesta){
                	console.log('esta es'+respuesta);
                    if(!isNaN(respuesta)){   
                        $("#modalForm").modal('hide');
                         filtrar('frmPerfil');  
                                          
                    }                     
                        
                } //success
                ,error: function(respuesta){
						$("#modalMensaje").children().children().children().children('.modal-title').text('Alerta!');
			$("#modalMensaje").children().children().children('.modal-body').html('<p><strong>'+respuesta+'</strong></p>');
			$("#modalMensaje").children().children().children('.modal-footer').html('<a class="btn btn-default" data-dismiss="modal">'+respuesta+'</a>');
			$("#modalMensaje").modal('show');
                } //error
            }) //ajaxSubmit
       
        }

        //submitHandler
    }) //validate
    
    $("#frmPerfil").submit();   
	

}


function eliminar(id)
{
	        $("#modalMensaje").children().children().children().children('.modal-title').text('Alerta!');
			$("#modalMensaje").children().children().children('.modal-body').html('<p><strong>¿Desea eliminar el registro?</strong></p>');
			$("#modalMensaje").children().children().children('.modal-footer').html('<a class="btn btn-default" data-dismiss="modal">Cerrar</a>'+
		'<a class="btn btn-danger" onclick="confirmar('+id+');">Confirmar</a>');
			$("#modalMensaje").modal('show');
	       
}

function confirmar(id)
{
	var token = $('#tok').children().val();
	$.ajax({
		url: 'profile/'+id,
		type: 'DELETE',
		data: {_token: token},
		success: function(res){
          	

                $("#modalMensaje").modal('hide');
                filtrar('frmPerfil');

            			
                
		}
	});
	
}

function filtrar(formulario)
{
	var token = $('#tok').children().val();
 	var filtro="profile/grid?_token="+token;

    $("#"+formulario+" :input").each(function(){

        
        if(this.id!='' && $("#"+this.id).val()!=''){
            filtro+="&"+this.name+"="+$("#"+this.id).val();
        }

    });

    $("#flexigrid").flexOptions({
	        url: filtro
    }).flexReload();

}

function selecciona(id)
{
 $('#'+id+' input[type=checkbox]').prop('checked', true);;
}

function deselecciona(id)
{
 $('#'+id+' input[type=checkbox]').prop('checked', false);;
}