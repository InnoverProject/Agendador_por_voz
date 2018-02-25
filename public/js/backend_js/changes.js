function cambia(){

$.ajax({
		url: '/users', 
		type: 'GET',
		success: function(res){
		$(".container-fluid").empty();
	
			//lista(id);
			//$("#modal_2").modal('hide');

		}
	});
}