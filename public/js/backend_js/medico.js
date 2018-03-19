$(document).ready(function() {
	var token = $('#tok').children().val();
 	var filtro="doctor/grid?_token="+token;

    $("#flexigrid").flexigrid({ 
		url: filtro,
		dataType: "json",
		method: 'POST',
		colModel: [
			{display:"Nombre",  name:"nombreMedico",  width:300, sortable: true, align:"center"},
			{display:"Teléfono",  name:"tel",  width:300, sortable: true, align:"center"},
			{display:"Correo",  name:"correo",  width:300, sortable: true, align:"center"},
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


	$.ajax({
		url: 'doctor/'+id+'/edit',
		type: 'GET',
		success: function(res){
			
			$("#modalForm").children().children().children().children('.modal-title').text('Agregar médico');
			$("#modalForm").children().children().children('.modal-body').html(res);
			$("#modalForm").modal('show');
 	
			//$('#perfil_id').val(perfil_id);
		}
	});
/*	
$(function() {
     $('#foto').change(function(e) { 
       //alert('aqui');
         addImage(e);  
        });

        function addImage(e){
         var file = e.target.files[0],
         imageType = /image.*/;
         /*console.log(file);
       
         if (!file.type.match(imageType))
          return;
     
         var reader = new FileReader();
         reader.onload = fileOnload;
         reader.readAsDataURL(file);
        }
     
        function fileOnload(e) {
         var result=e.target.result;
         $('#imagenes').attr("src",result);
        }
       });
*/
}

 
function guardar()
{


    $("#frmMedicoRegistro").validate({
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
			$("#modalMensaje").children().children().children('.modal-footer').html('<a class="btn btn-default" data-dismiss="modal">'+respuesta+'</a>');
			$("#modalMensaje").modal('show');
                } //error
            }) //ajaxSubmit
       
        }

        //submitHandler 
    }) //validate
    
    $("#frmMedicoRegistro").submit();   
	

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
		url: 'doctor/'+id,
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
 	var filtro="doctor/grid?_token="+token;

    $("#"+formulario+" :input").each(function(){

        
        if(this.id!='' && $("#"+this.id).val()!=''){
            filtro+="&"+this.name+"="+$("#"+this.id).val();
        }

    });

    $("#flexigrid").flexOptions({
	        url: filtro 
    }).flexReload();

}

function importa(){
$("#archivo").validate({
        submitHandler: function(form){
            $(form).ajaxSubmit({
                success: function(respuesta){
                    //console.log('esta es'+respuesta);
                    if(!isNaN(respuesta)){   
                        
                         filtrar('frmMedicoRegistro');  
                                          
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
    
    $("#archivo").submit(); 


}


 function guardarPerfilMed() 
{


    $("#frmMedicoPerfil").validate({
        submitHandler: function(form){
            $(form).ajaxSubmit({
                success: function(respuesta){
                    console.log('esta es'+respuesta);
                    if(!isNaN(respuesta)){   
                        $("#normalModal5").modal('hide');
                         //filtrar('frmMedicoRegistro');  
                                          
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
    
    $("#frmMedicoPerfil").submit();   
    

}
 



function perfilMed(id){

   $.ajax({
        url: 'doctor/'+id+'/profile',
        type: 'GET',
        success: function(res){
         

            $("#normalModal5").children().children().children().children('.modal-title').text('Agregar perfil médico');
            $("#normalModal5").children().children().children('.modal-body').html(res);

            $("#normalModal5").modal('show');

    
            //$('#perfil_id').val(perfil_id);
        }
    });
}
 
 