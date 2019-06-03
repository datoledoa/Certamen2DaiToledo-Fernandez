var Seleccionar;
		
		$(document).ready(function(){
			$('#leftMenu').on("click", "a", function(){
				Seleccionar = $(this).attr('id');
				$.getJSON('http://localhost:8080/noticia/' + Seleccionar + "'", function(result){
		      		$("#titulo").text(result.Titulo);
		      		
		      		$("#cuerpo").text(result.Cuerpo);
		    	});
		    	$.ajax({
			    	url: 'http://localhost:8080/nuevoEstado/' + Seleccionar + "'", 
			        success: function(result){
			        	console.log("Leido: leída");
			    	}
				});
	        });
	        $('#rightMenu').on("click", "a", function(){
				Seleccionar = $(this).attr('id');
				$.getJSON('http://localhost:8080/noticia/' + Seleccionar + "'", function(result){
		      		$("#titulo").text(result.Titulo);
		      		
		      		$("#cuerpo").text(result.Cuerpo);
		    	});
		    	$.ajax({
			    	url: 'http://localhost:8080/nuevoEstado/' + Seleccionar + "'", 
			        success: function(result){
			        	console.log("Leido: leída");
			    	}
				});
	        });
	        $.getJSON('http://localhost:8080/porleer', function(result) {
		        $.each(result, function(key,value) {
		        	$("#rightMenu").append('<a id="' + value.cod_int + '"' + 'href="#" class="w3-bar-item w3-button"' + '">' + value.Titulo + '</a>');
		        });
			});
			$.getJSON('http://localhost:8080/leidas', function(result) {
		        $.each(result, function(key,value) {
		        	$("#leftMenu").append('<a id="' + value.cod_int + '"' + 'href="#" class="w3-bar-item w3-button"' + '">' + value.Titulo + '</a>');
			    }); 
			});
		});