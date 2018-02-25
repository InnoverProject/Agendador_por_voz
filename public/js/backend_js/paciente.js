 $(document).ready(function() {

		

	var token = $('#tok').children().val();
 	var filtro="patient/grid?_token="+token;

    $("#flexigrid").flexigrid({
		url: filtro,
		dataType: "json",
		method: 'POST',
		colModel: [
			{display:"Nombre",  name:"nombreMedico",  width:300, sortable: true, align:"center"},
			{display:"Teléfono",  name:"tel",  width:300, sortable: true, align:"center"},
			{display:"Correo",  name:"correo",  width:300, sortable: true, align:"center"},
			{display:"Estatus",  name:"correo",  width:300, sortable: true, align:"center"},
			{display:"Acciones",  name:"",  width:400, sortable: false, align:"center"}
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
//


});


function agregar(id)
{

console.log(id);

	$.ajax({
		url: 'patient/'+id+'/edit',
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


    $("#frmPacienteRegistro").validate({
        submitHandler: function(form){
            $(form).ajaxSubmit({
                success: function(respuesta){
                	console.log('esta es'+respuesta);
                    if(!isNaN(respuesta)){   
                        $("#modalForm").modal('hide');
                         filtrar('frmMedicoRegistro');  
                                          
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
    
    $("#frmPacienteRegistro").submit();   
	

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
		url: 'patient/'+id,
		type: 'DELETE',
		data: {_token: token},
		success: function(res){
          	

                $("#modalMensaje").modal('hide');
                filtrar('frmMedicoRegistro');

            			
                
		}
	});
	
}

function filtrar(formulario)
{
	var token = $('#tok').children().val();
 	var filtro="patient/grid?_token="+token;

    $("#"+formulario+" :input").each(function(){

        
        if(this.id!='' && $("#"+this.id).val()!=''){
            filtro+="&"+this.name+"="+$("#"+this.id).val();
        }

    });

    $("#flexigrid").flexOptions({
	        url: filtro
    }).flexReload();

}

function lista(id){


	var token = $('#tok').children().val();
	$.ajax({
		url: 'patient/'+id+'/archivo',
		type: 'POST',
		data: {_token: token},
		success: function(res){
		

          	
			$("#modalForm").children().children().children().children('.modal-title').text('Agregar archivo');
			$("#modalForm").children().children().children('.modal-body').html(res);
			 $(document).ready(function() {
			 	Dropzone.autoDiscover = false;
		$("#dropzone").dropzone({
			url: "patient/agregar",
			addRemoveLinks: true,
			maxFileSize: 1000,
			dictResponseError: "Ha ocurrido un error en el server",
			acceptedFiles: 'image/*,.jpeg,.jpg,.png,.JPEG,.JPG,.PNG,application/pdf,.xls,.xlsx,.docx',
			sending: function(file, xhr, formData) {
            formData.append("_token", token);
            formData.append("id", id);
},
			complete: function(file)
			{
                	        var element;
							(element = file.previewElement) != null ? 
							element.parentNode.removeChild(file.previewElement) : 
							false;
			},
			success:function(file,res){
               $("#list").empty();
               $("#list").html(res);
			},

			error: function(file)
			{
				alert("Error subiendo el archivo " + file.name);
			},
			removedfile: function(file, serverFileName)
			{
				var name = file.name;
				$.ajax({
					type: "POST",
					url: "patient/"+name+"/file",
					data: {_token: token},
					success: function(data)
					{
						
							var element;
							(element = file.previewElement) != null ? 
							element.parentNode.removeChild(file.previewElement) : 
							false;
							
						
					}
				});
			}
		});
			 });
			
			$("#modalForm").modal('show');
	
 
 	  
			
		}
	});


} 

function eliminarFile(id,archivo){

//var nombre=$("#individual"+id).val();
console.log('el id'+id);


$.ajax({
		url: 'patient/'+id+'/'+archivo+'/onefile',
		type: 'GET',
		success: function(res){
		
		$("#list").empty();
		$("#list").html(res);
			//lista(id);
			//$("#modal_2").modal('hide');

		}
	});
}


function receta(id){

   $.ajax({
		url: 'patient/'+id+'/recipe',
		type: 'GET',
		success: function(res){
         

			$("#modalForm").children().children().children().children('.modal-title').text('Agregar médico');
			$("#modalForm").children().children().children('.modal-body').html(res);

			$("#modalForm").modal('show');

 	
			//$('#perfil_id').val(perfil_id);
		}
	});
}
