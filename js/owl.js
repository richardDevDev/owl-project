$(document).ready(function(){
 
	$('.ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	});
 
	$(window).scroll(function(){
		$('.ir-arriba').show();
		$('.ir-arriba').slideUp(300);
	});
 
});


function flushForm(input){
	var elementos = $("."+input);
	var form = new FormData();
	for (var i=0; i<elementos.length; i++) {
		//alert(elementos[i].id+elementos[i].value);
	    form.append(elementos[i].id,elementos[i].value);
	}
	return form;
}

function sendMail(datos){
	$.ajax({
		url:   'app/controller/mail.php',
		type:  'POST',
		data:  datos,
		processData: false,
		contentType: false,
		beforeSend: function () {
		        
		},
		success:  function (response) {
			console.log(response);
			if (isNaN(response)) {
				
				
				
			}else{
				
				errorNo(response);
			}
			
		}
	});
}

function validar(){
	var elementos = $(".notnull");
	var contador=0;
	for (var i=0; i<elementos.length; i++) {
	   if ($("#"+elementos[i].id).val()=="") {
	   	paintValidation("EC644B",$("#val"+elementos[i].id));
	   	return false;
	   }else{
	   	paintValidation("87D37C",$("#val"+elementos[i].id));
	   	contador++;
	   }
	}
	if (contador==elementos.length) {
		return true
	}
}

function darken(input){
	$("#"+input.id+"-img").addClass("darken");
	$("#"+input.id).addClass("glow");
}

function nodarken(input){
	$("#"+input.id+"-img").toggleClass("darken");
	$("#"+input.id).toggleClass("glow");
}

function paintValidation(color,input){
	input.css("background-color","#"+color);
}

function errorNo(err){
	switch(parseInt(err)){
		case 100:
			 $("#mensaje").text("Exito! Mensaje Enviado.").addClass("success");
		break;
		case 200:
			 $("#mensaje").text("Error! No se ha enviado el mensaje, actualiza la pagina y vuelve a intentar.").addClass("error");
		break;
		
		default:
		
		break;
	}
}

function recaptchaVerify() {
    var response = grecaptcha.getResponse();

    if(response.length == 0){
    	$("#captcha").css("background-color","#EC644B");
    	return false;
    } else {
     	$("#captcha").css("background-color","#87D37C");
     	return true;
    }
    return false;
  }