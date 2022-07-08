
function formValidate(input){
	var elementos = $("."+input);
	var form = new FormData();
	var j=0;
	var faltan="";

	for (var i=0; i<elementos.length; i++) {
		if ($(elementos[i]).hasClass("notnull")) {
			//Busca si el elemento tiene la clase notnull
			if (elementos[i].value=="") {
				faltan+=$("#label-"+elementos[i].id).text()+'<br>';
			}
		}
		if (elementos[i].type=="file") {
			form.append(elementos[i].id,elementos[i].files[0]);
		}
			form.append(elementos[i].id,elementos[i].value);
	}
	if (faltan!="") {
		swal("Validacion","Los siguientes campos son obligatorios<br>"+faltan,"error");
	}else{
		form.append("handler",input);
		sendLogin(form);
	}
}

function sendLogin(datos){
	$.ajax({
		data:  datos,
		url:   'app/handlers/ajax.handler.class.php',
		type:  'post',
		dataType: "html",
		data:  datos,
		processData: false,
		contentType: false,
		cache: false,
		beforeSend: function () {
		        
		},
		success:  function (response) {
			console.log(response);
			result=JSON.parse(response);
			switch (result.no){
				case "100":
				$("#mensajes").text("Bienvenido "+result.message[0].nombre);
				setTimeout("redireccionar(result.message[0].cve_cliente);",500);
				break;
				case "101":
					$("#mensajes").text("Usuario o Contraseña Incorrectos");
				break;
				case "102":
					$("#mensajes").html("Bienvenido "+result.message[0].nombre+" <br> Ingresando . . .");
					setTimeout("location.href= result.url;",500);
				break;
			}

		}
	});
}

function mensaje(msg){
	$("#mensajes").text(msg);
	$("#mensajes").show("swing");
}

function redireccionar(id_usuario){
	if (typeof id_usuario!="undefined") {
		window.location="/venta?id="+id_usuario;
	}
	
}