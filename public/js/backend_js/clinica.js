 $(document).ready(function() {
 		/*var picker = new CP(document.querySelector('#color'));
    picker.on("change", function(color) {
        $('#superior').css('background-color','#' + color);
        $('#side').css('background-color','#' + color);
        $('#logo').css('background-color','#' + color);
        $('#menu').css('background-color','#' + color);
        $('#menu2').css('background-color','#' + color);
        $('#menu3').css('background-color','#' + color);
        $('#menu4').css('background-color','#' + color);
        $('#menu5').css('background-color','#' + color);
        $('#menu6').css('background-color','#' + color);
        $('#menu7').css('background-color','#' + color);
        $('#menu8').css('background-color','#' + color);
        $('#foot').css('background-color','#' + color);
    });
 */
  	var picker = new CP(document.querySelector('#color2'));
    picker.on("change", function(color) {
        $('#superior').css('color','#' + color);
        $('#side').css('color','#' + color);
        $('#logo').css('color','#' + color);
        $('#menu').css('color','#' + color);
        $('#menu2').css('color','#' + color);
        $('#menu3').css('color','#' + color);
        $('#menu4').css('color','#' + color);
        $('#menu5').css('color','#' + color);
        $('#menu6').css('color','#' + color);
        $('#menu7').css('color','#' + color);
        $('#menu8').css('color','#' + color);
        $('#foot').css('color','#' + color);
        $('#foot').css('color','#' + color);
        $('#foot').css('color','#' + color);
         $('#ver').val('#' + color);
         
    });



	var token = $('#tok').children().val();
 	var filtro="clinic/grid?_token="+token;

    $("#flexigrid").flexigrid({
		url: filtro,
		dataType: "json", 
		method: 'POST',
		colModel: [
			{display:"Nombre",  name:"nombre",  width:300, sortable: true, align:"center"},
			{display:"Telèfono",  name:"des",  width:300, sortable: true, align:"center"},
			{display:"Correo",  name:"es",  width:300, sortable: true, align:"center"},
			{display:"Direcciòn",  name:"",  width:200, sortable: false, align:"center"},
			{display:"Estatus",  name:"",  width:200, sortable: false, align:"center"},
			{display:"Acciòn",  name:"",  width:200, sortable: false, align:"center"}
		],
		sortname: "nombre"
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
		url: 'clinic/'+id+'/edit',
		type: 'GET',
		success: function(res){
			
			$("#modalForm").children().children().children().children('.modal-title').text('Agregar especialidad');
			$("#modalForm").children().children().children('.modal-body').html(res);
 	       var picker = new CP(document.querySelector('#color'));
    picker.on("change", function(color) {
       
        $('#color').css('background-color','#'+color);
        $('#colorE').val('#'+color);
    });
			$("#modalForm").modal('show');
 	      	//$('#perfil_id').val(perfil_id);
		}
	});

 
}


function guardar()
{


    $("#frmClinicaRegistro").validate({
        submitHandler: function(form){
            $(form).ajaxSubmit({
                success: function(respuesta){
                	console.log('esta es'+respuesta);
                    if(!isNaN(respuesta)){   
                        $("#modalForm").modal('hide');
                         filtrar('frmClinicaRegistro');  
                                          
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
    
    $("#frmClinicaRegistro").submit();   
	

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
		url: 'clinic/'+id,
		type: 'DELETE',
		data: {_token: token},
		success: function(res){
          	

                $("#modalMensaje").modal('hide');
                filtrar('frmClinicaRegistro');

            			
                
		}
	});
	
}

function filtrar(formulario)
{
	var token = $('#tok').children().val();
 	var filtro="clinic/grid?_token="+token;

    $("#"+formulario+" :input").each(function(){

        
        if(this.id!='' && $("#"+this.id).val()!=''){
            filtro+="&"+this.name+"="+$("#"+this.id).val();
        }

    });

    $("#flexigrid").flexOptions({
	        url: filtro
    }).flexReload();

} 

