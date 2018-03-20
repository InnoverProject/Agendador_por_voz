$(document).ready(function() {
						 
startArtyom();

						 });


/*
function onTecla(e)

	{	
		var num = e.keyCode;
		var letra=String.fromCharCode(num);
		artyom.say(String(letra));
		

	}
 
	document.onkeydown = onTecla;
	if(document.all)document.captureEvents(Event.KEYDOWN);	
	*/
	// $(document).ready(function() {
/*
		$('#control1').mouseover(function() {
			artyom.say("Botón, agregar")
		});
		$('#control2').mouseover(function() {
			artyom.say("Botó, para activar voz")
		});
		$('#flexigrid').mouseover(function() {
			artyom.say("Es una tabla con las principales caracteristicas")
		});

		$('#control1').mouseout(function() {
			artyom.shutUp();
		});
		$('#flexigrid').mouseout(function() {
			artyom.shutUp();
		});
		$('#control2').mouseout(function() {
			artyom.shutUp();
		});
*/
		//El sistema responde
		artyom.addCommands([
			{
				indexes:["Hola","saluda","gracias","descansa","escucha","toma dictado","es todo"],
				action: function(i){
					if (i==0) {
						var f=new Date();
						var hora=f.getHours();
						if (hora<12) {
						artyom.say("Hola, buenos dias");	
						}
						if (f.getHours()>12) {
						artyom.say("Hola, buenas tardes");	
						}
						
					}
					if (i==1) {
						artyom.say("Que tal, soy un asistente personal que ayudará a la fácil navegación dentro de la aplicación. Espero que ésta presentación sea de su agrado");
					}
					if (i==2) {
						artyom.say("Hasta luego.");
					    stopArtyom();
					}
					if (i==3) {
						artyom.say("Muy bien.");
						artyom.dontObey();
					}
					if (i==4) {
						artyom.say("Lo escucho.");
						//artyom.dontObey();
					}
					if (i==5) {
						artyom.say("Estoy lista, para el dictado");
						//artyom.dontObey();
						artyom.redirectRecognizedTextOutput(function(recognized,isFinal){
    if(isFinal){
        console.log("Texto final reconocido: " + recognized);
    }else{
    	if (recognized=="es todo") {
    		startArtyom();
    	}else{
    	$('#correo').val(recognized);	
    	}
        
    }
});
					

//UserDictation.start();
					}
				}
			},
			{
				indexes:['me voy','chau'],
				action: function(){
					alert('ok, chau');					
				}
			},
			{
				indexes:['abre usuarios','abre especialidad','abre pacientes','abre perfiles','abre clínica','captura','guarda','gracias por tu ayuda','cerrar'],
				action: function(i){
					if (i==0) {
						artyom.say("Abriendo el módulo de usuarios");
						
						location.href ="http://localhost:8080/SmartAgenda/public/users";
					
						
					}
					if (i==1) {
						artyom.say("Abriendo el módulo de especialidad");
                         location.href ="http://localhost:8080/SmartAgenda/public/especial";
                       
                         //startArtyom();
		
					}
					if (i==2) {
						artyom.say("Abriendo el módulo de pacientes");
						location.href ="http://localhost:8080/SmartAgenda/public/patient";
						
						//startArtyom();
					}
					if (i==3) {
						artyom.say("Abriendo el módulo de perfiles");
						location.href ="http://localhost:8080/SmartAgenda/public/profile";
						
						//startArtyom();
					}
					if (i==4) {
						artyom.say("Abriendo el módulo de clinica");
						location.href ="http://localhost:8080/SmartAgenda/public/clinic";
						
						//startArtyom();
					}
					
					if (i==5) {
						artyom.say("Muy bien");
						//location.href ="http://localhost:8080/SmartAgenda/public/especial";
					$.ajax({ 
						url: 'especial/'+0+'/edit',
						type: 'GET',
						success: function(res){
							
							$("#modalForm").children().children().children().children('.modal-title').text('Agregar especialidad');
							$("#modalForm").children().children().children('.modal-body').html(res);
							if ($("#frmEspecialidadRegistro").find('#nombre').val()=="") {
								artyom.say("Dime el nombre de la especialidad");

                               artyom.addCommands([
			                             {
                        indexes:[a="médico general"],
				action: function(i){
					var r=a;
					if (i==0) {
						$("#frmEspecialidadRegistro").find('#nombre').val(r);
						artyom.say("listo");
					}
				
				}
                                            }]);



								
							}
							//$("#frmEspecialidadRegistro").find('#nombre').val('Medico general');
						     $("#frmEspecialidadRegistro").find('#desc').val('medician en general')
                               

						    $("#frmEspecialidadRegistro").find('#estatus').val(1)
						       
							
						
							$("#modalForm").modal('show');
				 	
							//$('#perfil_id').val(perfil_id);
						      }
					         });



						//startArtyom();
					}
					if (i==6) {

						$("#frmEspecialidadRegistro").validate({
        submitHandler: function(form){
            $(form).ajaxSubmit({
                success: function(respuesta){
                	console.log('esta es'+respuesta);
                    if(!isNaN(respuesta)){   
                        $("#modalForm").modal('hide');
                         filtrar('frmEspecialidadRegistro');
                         artyom.say("Ha sido guardado correctamente.");  
                                          
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
    
    $("#frmEspecialidadRegistro").submit();   
	

					}
					if (i==7) {
						artyom.say('Adiós');
						stopArtyom();
					}
					if (i==8) {
						$("#modalForm").modal('hide');
						
					}


				}
			},
			{
				indexes:['limpiar'],
				action: function(){
					$('#salida').val('');
				}
			}
		]); 

		// Escribir lo que escucha.
		artyom.redirectRecognizedTextOutput(function(text,isFinal){
			var texto = $('#salida');
			if (isFinal) {
				texto.val(text);
			}else{
				
			}
		});


		//inicializamos la libreria Artyom
		function startArtyom(){
			artyom.initialize({
				lang: "es-ES",
				continuous:true,// Reconoce 1 solo comando y para de escuchar
				obeyKeyword:"escucha",
	            listen:true, // Iniciar !
	            debug:true, // Muestra un informe en la consola
	            speed:1 // Habla normalmente
			});
		};
		
		// Stop libreria;
		function stopArtyom(){
			artyom.fatality();// Detener cualquier instancia previa
		};

		// leer texto
		$('#btnLeer').click(function (e) {
            e.preventDefault();
            var btn = $('#btnLeer');
            if (artyom.speechSupported()) {
                btn.addClass('disabled');
                btn.attr('disabled', 'disabled');

                var text = $('#leer').val();
                if (text) {
                    var lines = $("#leer").val().split("\n").filter(function (e) {
                        return e
                    });
                    var totalLines = lines.length - 1;

                    for (var c = 0; c < lines.length; c++) {
                        var line = lines[c];
                        if (totalLines == c) {
                            artyom.say(line, {
                                onEnd: function () {
                                    btn.removeAttr('disabled');
                                    btn.removeClass('disabled');
                                }
                            });
                        } else {
                            artyom.say(line);
                        }
                    }
                }
            } else {
                alert("Your browser cannot talk !");
            }
        });

var UserDictation = artyom.newDictation({
    continuous:true, // Activar modo continuous if HTTPS connection
    onResult:function(text){
        // Mostrar texto en consola
        $('#correo').val(text);
    },
    onStart:function(){
        console.log("Dictado iniciado");
    },
    onEnd:function(){
        alert("Dictado detenido por el usuario");
    }
});