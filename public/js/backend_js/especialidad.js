$(document).ready(function() {
	var token = $('#tok').children().val();
 	var filtro="especial/grid?_token="+token;

    $("#flexigrid").flexigrid({
		url: filtro,
		dataType: "json", 
		method: 'POST',
		colModel: [
			{display:"Nombre",  name:"nombre",  width:300, sortable: true, align:"center"},
			{display:"Descripción",  name:"des",  width:300, sortable: true, align:"center"},
			{display:"Estatus",  name:"es",  width:300, sortable: true, align:"center"},
			{display:"Acciones",  name:"",  width:200, sortable: false, align:"center"}
		],
		sortname: "nombre"
		,sortorder: "asc"
		,usepager: true
        ,useRp: false
        ,singleSelect: true
        ,resizable: false
        ,showToggleBtn: false
        ,rp: 15
        ,width: 1200
        ,height: 380
	});
//$('#busqueda').hide();
});


function agregar(id)
{ 
console.log(id);

	$.ajax({
		url: 'especial/'+id+'/edit',
		type: 'GET',
		success: function(res){
			
			$("#modalForm").children().children().children().children('.modal-title').text('Agregar especialidad');
			$("#modalForm").children().children().children('.modal-body').html(res);
			$("#modalForm").modal('show');
 	
			//$('#perfil_id').val(perfil_id);
		}
	});


}


function guardar()
{


    $("#frmEspecialidadRegistro").validate({
        submitHandler: function(form){
            $(form).ajaxSubmit({
                success: function(respuesta){
                	console.log('esta es'+respuesta);
                    if(!isNaN(respuesta)){   
                        $("#modalForm").modal('hide');
                         filtrar('frmEspecialidadRegistro');  
                                          
                    }                     
                        
                } //success
                ,error: function(respuesta){
						$("#modalMensaje").children().children().children().children('.modal-title').text('Alerta!');
			$("#modalMensaje").children().children().children('.modal-body').html('<p><strong>'+respuesta+'</strong></p>');
			$("#modalMensaje").children().children().children('.modal-footer').html('<a class="btn btn-default" data-dismiss="modal">'+res+'</a>');
			$("#modalMensaje").modal('show');
                } //error
            }) //ajaxSubmit
       
        }

        //submitHandler
    }) //validate
    
    $("#frmEspecialidadRegistro").submit();   
	

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
		url: 'especial/'+id,
		type: 'DELETE',
		data: {_token: token},
		success: function(res){
          	

                $("#modalMensaje").modal('hide');
                filtrar('frmEspecialidadRegistro');

            			
                
		}
	});
	
}

function filtrar(formulario)
{
	var token = $('#tok').children().val();
 	var filtro="especial/grid?_token="+token;

    $("#"+formulario+" :input").each(function(){

        
        if(this.id!='' && $("#"+this.id).val()!=''){
            filtro+="&"+this.name+"="+$("#"+this.id).val();
        }

    });

    $("#flexigrid").flexOptions({
	        url: filtro
    }).flexReload();

} 

