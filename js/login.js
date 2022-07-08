
$(document).ready(function(){
	$( "#log" ).submit(function( event ) {
		mensaje("Validando");
		if (validar()==true) {
			send(flushForm("input"));
		}else{
			mensaje("Usuario o Contraseña Incorrectos")
		}

		event.preventDefault();
	});
});


function flushForm(input){
	var elementos = $("."+input);
	var form = new FormData();
	for (var i=0; i<elementos.length; i++) {
	    form.append(elementos[i].id,elementos[i].value);
	}
	form.append("handler","login");
	return form;
}

function validar(){
	var elementos = $(".notnull");var contador=0;for (var i=0; i<elementos.length; i++) {  if ($("#"+elementos[i].id).val()=="") {paintValidation("EC644B",$("#val"+elementos[i].id));return false; }else{paintValidation("87D37C",$("#val"+elementos[i].id));contador++; }}if (contador==elementos.length) {return true}
}

function paintValidation(color,input){
	input.css("background-color","#"+color);
}

function send(datos){
	$.ajax({
		data:  datos,
		url:   'app/view/handler/ajax.handler.class.php',
		type:  'post',
		dataType: "html",
		data:  datos,
		processData: false,
		contentType: false,
		cache: false,
		beforeSend: function () {
		        
		},
		success:  function (response) {
			if (isNaN(response)) {
				$("#mensajes").text("Redireccionando...");
				redireccionar(response);
			}else{
				$("#mensajes").text("Datos Incorrectos vuelve a intentar");
			}
		}
	});
}
function redireccionar(dir){
	setTimeout("location.href = '"+dir+"';", 1000)
} 

function mensaje(msg){
	$("#mensajes").text(msg);
	$("#mensajes").show("swing");
}

function redireccionar(dir){
	setTimeout("location.href = '"+dir+"';", 1000)

} 
