$(document).ready(function() {
						 
startArtyom();

						 });

	// $(document).ready(function() {

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

		//El sistema responde
		artyom.addCommands([
			{
				indexes:["buenos días",'quién es tu creador','Saluda a mis seguidores','me voy'],
				action: function(i){
					if (i==0) {
						artyom.say("Hola César, buenos dias");
					}
					if (i==1) {
						artyom.say("Tú, eres mi creador");
					}
					if (i==2) {
						artyom.say("Hola gente, espero les este yendo muy bien y que este tutorial les ayude de mucho. Saludos");
					}
					if (i==3) {
						artyom.say("Adios");
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
				indexes:['abre usuarios','abre especialidad','abre pacientes','abre perfiles','abre clínica','ya no gracias','captura'],
				action: function(i){
					if (i==0) {
						artyom.say("Abriendo el módulo de usuarios");
						artyom.dontObey();
						location.href ="http://localhost:8080/SmartAgenda/public/users";
						

						
					}
					if (i==1) {
						artyom.say("Abriendo el módulo de medicos");
                         location.href ="http://localhost:8080/SmartAgenda/public/doctor";
                       
                         //startArtyom();
		
					}
					if (i==2) {
						artyom.say("Abriendo el módulo de especialidades");
						location.href ="http://localhost:8080/SmartAgenda/public/especial";
						
						//startArtyom();
					}
					if (i==3) {
						artyom.say("Abriendo el módulo de pacientes");
						location.href ="http://localhost:8080/SmartAgenda/public/patient";
						
						//startArtyom();
					}
					if (i==4) {
						artyom.say("Abriendo el módulo de perfiles");
						location.href ="http://localhost:8080/SmartAgenda/public/profile";
						
						//startArtyom();
					}
					if (i==5) {
						artyom.say("Abriendo el módulo de clinica");
						location.href ="http://localhost:8080/SmartAgenda/public/clinic";
					
						//startArtyom();
					}
					if (i==6) {
						artyom.say("Muy bien, señor César, hasta pronto");
						
						//startArtyom();
					}
					if (i==7) {
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
							$("#frmEspecialidadRegistro").find('#desc').val('enfermedades en general');
							$("#frmEspecialidadRegistro").find('#estatus').val(1);
							$("#modalForm").modal('show');
				 	
							//$('#perfil_id').val(perfil_id);
						      }
					         });



						//startArtyom();
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
				 obeyKeyword:"yoi",
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
