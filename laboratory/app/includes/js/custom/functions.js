$(document).ready(function(){
	$( ".btn" ).click(function( event ) {
		$(this).addClass("clicked");
	});

	//document.oncontextmenu = function(){return false;}
});

jQuery(document).ready(function($){
  $('#coin').on('click', function(){
    var flipResult = Math.random();
    $('#coin').removeClass();
    setTimeout(function(){
      if(flipResult <= 0.5){
        $('#coin').addClass('heads');
      }
      else{
        $('#coin').addClass('tails');
      }
    }, 100);
  });
});


function flipCoin(){
setTimeout(function(){
  $("#coin").click();
  relay();
},1000)
}

function relay(){
setTimeout("flipCoin()",8000);
}

var seleccion=new Array;
var counter_timeOut=0;
var timeoutTest=50;
var counter_panel=0;
var terminar=false;
var timeoutGeneral=0;
var ventaArr=new Array;
var selectArr=new Array;
var timer=0;
var timerCam=0;
var exacto=0;
var formatNumber = {
 separador: ",", // separador para los miles
 sepDecimal: '.', // separador para los decimales
 formatear:function (num){
 num +='';
 var splitStr = num.split('.');
 var splitLeft = splitStr[0];
 var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
 var regx = /(\d+)(\d{3})/;
 while (regx.test(splitLeft)) {
 splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
 }
 return this.simbol + splitLeft +splitRight;
 },
 new:function(num, simbol){
 this.simbol = simbol ||'';
 return this.formatear(num);
 }
}

$(".animsition").animsition({
    inClass: 'fade-in',
    outClass: 'fade-out',
    inDuration: 1500,
    outDuration: 800,
    linkElement: '.animsition-link',
    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
    loading: true,
    loadingParentElement: 'body', //animsition wrapper element
    loadingClass: 'animsition-loading',
    loadingInner: '', // e.g '<img src="loading.svg" />'
    timeout: false,
    timeoutCountdown: 2000,
    onLoadEvent: true,
    browser: [ 'animation-duration', '-webkit-animation-duration'],
    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    overlay : false,
    overlayClass : 'animsition-overlay-slide',
    overlayParentElement : 'body',
    transition: function(url){ window.location.href = url; }
});

function formData(handler,value){
	var form= new FormData();
	form.append("handler",handler);
	form.append("value",value);
	return form;
}

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
		send(form);
	}
}


function send(datos){
	$.ajax({
		url:   '/app/handlers/ajax.handler.class.php',
		type:  'POST',
		dataType: "html",
		data:  datos,
		processData: false,
		contentType: false,
		cache: false,
		beforeSend: function () {
		        $("#submit").attr("disabled","true");
		},
		error: function(){
			$("#connectionok").hide();
			$("#connectionno").show();
		}
		,
		success:  function (response) {
			$("#connectionok").show();
			$("#connectionno").hide();
			console.log(response);
			result=JSON.parse(response);
			switch (result.no){
				case "001":
				alert(result.message);
				   var blob = new Blob([result.message], {type: "text/plain;"});
				   saveAs(blob, result.name+".owl");

				break;
				case "92":
					swal({
					  title: 'Mensaje',
					  text: result.message,
					  type: result.type,
					  showCancelButton: false,
					  confirmButtonColor: '#3085d6',
					  confirmButtonText: 'Corregir!'

					}).then((result) => {
					  
					})
				break;

				case "93":
					$(".messageModal").text(result.message);
					setTimeout('$(".messageModal").text("");',2500);
				break;

				case "94":
					$(".message").text(result.message);
					setTimeout('$(".message").text("");',1500);
				break;

				case "95":
					swal({
						  title: 'Mensaje',
					  text: result.message,
					  type: result.type,
					  showCancelButton: false,
					  confirmButtonColor: '#3085d6',
					  confirmButtonText: 'Aceptar!'

					}).then((result) => {
					  if (result.value) {
					   	window.location.reload();
					  }
					})
				break;

				
			}
		}
	});
}

function puerta(){
	send(formData("listenPuerta","",""));
}


function fillBilletes(arr){
	var total=new Array;
	if (typeof B1000 != "undefined") {
		$total=0;
	for(var i=0;i<arr.length;i++){
		$("#in-1000-"+i).text(arr[i].B1000);	$("#sum-1000-0").text(	parseFloat(B1000)+parseFloat(arr[i].B1000));
		$("#in-500-"+i).text(arr[i].B500);		$("#sum-500-0").text(	parseFloat(B500)+parseFloat(arr[i].B500));
		$("#in-200-"+i).text(arr[i].B200);		$("#sum-200-0").text(	parseFloat(B200)+parseFloat(arr[i].B200));
		$("#in-100-"+i).text(arr[i].B100);		$("#sum-100-0").text(	parseFloat(B100)+parseFloat(arr[i].B100));
		$("#in-50-"+i).text(arr[i].B50);		$("#sum-50-0").text(	parseFloat(B50)+parseFloat(arr[i].B50));
		$("#in-20-"+i).text(arr[i].B20);		$("#sum-20-0").text(	parseFloat(B20)+parseFloat(arr[i].B20));
		$("#in-10-"+i).text(arr[i].M10);		$("#sum-10-0").text(	parseFloat(M10)+parseFloat(arr[i].M10));
		$("#in-5-"+i).text(arr[i].M5);			$("#sum-5-0").text(		parseFloat(M5)+parseFloat(arr[i].M5));
		$("#in-2-"+i).text(arr[i].M2);			$("#sum-2-0").text(		parseFloat(M2)+parseFloat(arr[i].M2));
		$("#in-1-"+i).text(arr[i].M1);			$("#sum-1-0").text(		parseFloat(M1)+parseFloat(arr[i].M1));
		$("#in-50c-"+i).text(arr[i].M50C);		$("#sum-50c-0").text(	parseFloat(M50C)+parseFloat(arr[i].M50C));

		$("#ingresoEfectivo-1000").text(arr[i].B1000);
		$("#ingresoEfectivo-500").text(arr[i].B500);
		$("#ingresoEfectivo-200").text(arr[i].B200);
		$("#ingresoEfectivo-100").text(arr[i].B100);
		$("#ingresoEfectivo-50").text(arr[i].B50);
		$("#ingresoEfectivo-20").text(arr[i].B20);
		$("#ingresoEfectivo-10").text(arr[i].M10);
		$("#ingresoEfectivo-5").text(arr[i].M5);
		$("#ingresoEfectivo-2").text(arr[i].M2);
		$("#ingresoEfectivo-1").text(arr[i].M1);
		$("#ingresoEfectivo-50C").text(arr[i].M50C);

		var total=
		(parseFloat(arr[i].B1000)*1000)+
		(parseFloat(arr[i].B500)*500)+
		(parseFloat(arr[i].B200)*200)+
		(parseFloat(arr[i].B100)*100)+
		(parseFloat(arr[i].B50)*50)+
		(parseFloat(arr[i].B20)*20)+
		(parseFloat(arr[i].M10)*10)+
		(parseFloat(arr[i].M5)*5)+
		(parseFloat(arr[i].M2)*2)+
		(parseFloat(arr[i].M1)*1)+
		(parseFloat(arr[i].M50C)*.50);
		}

		
		$("#ingresoEfectivo-total").text("$ "+formatNumber.new(parseFloat(total).toFixed(2)));
		$("#total-t").text(total[0]);
		$("#total-c").text(total[1]);
		$("#total").text(total[2]);
	}
	
}

$(".onclose").on('hidden.bs.modal', function () {
	location.reload();
});

function addImage(e){
	var file = e.target.files[0],
	imageType = /image.*/;
	//console.log(e);
	if (!file.type.match(imageType))
 		return;
	 
	var reader = new FileReader();
	reader.onload = function (f) {$('.'+e.target.id).attr('src', f.target.result);};
	reader.readAsDataURL(file);
	var form= new FormData();
	form.append("file",e.target.files[0]);
	form.append("handler","uploadFile");
	form.append("id",e.target.id);
	send(form);
 }


function preloadImage(e){
	var file = e.target.files[0],
	imageType = /image.*/;
	//console.log(e);
	if (!file.type.match(imageType))
 		return;
	var reader = new FileReader();
	reader.onload = function (f) {$('#vw-'+e.target.id).attr('src', f.target.result);$("#img-"+$("#sel").text()).attr('src', f.target.result);};

	reader.readAsDataURL(file);

	uploadImage(e);
 }

  function uploadImage(e){
	var file = e.target.files[0],
	imageType = /image.*/;
	if (!file.type.match(imageType))
 		return;
	var reader = new FileReader();
	reader.onload = function (f) {$('#vw-'+e.target.id).attr('src', f.target.result); $("#ticket-logo").attr("src",f.target.result);$("#ticket-logo").attr("width","60%")};

	reader.readAsDataURL(file);
	
	var form= new FormData();
	form.append("file",e.target.files[0]);
	form.append("handler","uploadImage");
	form.append("id",e.target.title);
	form.append("value",e.target.name);
	send(form);
 }

function tableResumen(elements){
	tbody=$("#resumen");
	tbody.html("");
	var total=0;
	for (var j in elements) {
		if (elements[j]>0) {
			var row=$("<tr></tr>");
			col1=$("<td></td>").text(elements[j]);
			if (j>0) {
				if (j<20) {
					col2=$("<td></td>").text("Moneda $ "+j);
				}else{
					col2=$("<td></td>").text("Billete $ "+j);
				}
				
			}else{
				col2=$("<td></td>").text(j);
			}
			
			col3=$("<td></td>").text("$ "+(parseFloat(elements[j])*parseFloat(Number((j).match(/\d+$/)))).toFixed(2));
			total=parseFloat(total)+parseFloat(elements[j])*parseFloat(Number((j).match(/\d+$/)));
			row.append(col1);
			row.append(col2);
			row.append(col3);
			tbody.append(row);
			$("#label-total").text("$ "+total.toFixed(2));
		}
		
	}
}

function lecturaDispositivos(arr){
	$("#leer-10").text(arr.M10);
	$("#leer-5").text(arr.M5);
	$("#leer-2").text(arr.M2);
	$("#leer-1").text(arr.M1);
	$("#leer-50c").text(arr.M50C);
}



function resumen(){
	tbody=$("#resumen");
	tbody.text("");
	for(var i=0;i<ventaArr[0].articulos.length;i++){
		if (ventaArr[0].articulos[i].estatus=="1") {
			var row=$("<tr></tr>");
			row.append($("<td></td>").text(parseFloat(ventaArr[0].articulos[i].cantidad).toFixed(2)));
			row.append($("<td></td>").text(ventaArr[0].articulos[i].clave_articulo));
			row.append($("<td></td>").text("$ "+parseFloat(ventaArr[0].articulos[i].precio).toFixed(2)));
			tbody.append(row);
		}
	}
}

function zfill(number, width) {
    var numberOutput = Math.abs(number); /* Valor absoluto del número */
    var length = number.toString().length; /* Largo del número */ 
    var zero = "0"; /* String de cero */  
    
    if (width <= length) {
        if (number < 0) {
             return ("-" + numberOutput.toString()); 
        } else {
             return numberOutput.toString(); 
        }
    } else {
        if (number < 0) {
            return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
        } else {
            return ((zero.repeat(width - length)) + numberOutput.toString()); 
        }
    }
}

function cancelarVenta(motivo){
	swal({
	  title: 'Estas seguro de Cancelar la Compra?',
	  text: "Si has ingresado dinero, asegurate de estar frente al kiosko para realizar tu devolucion",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Quiero Cancelar!',
	  cancelButtonText: 'Regresar'

	}).then((result) => {
	  if (result.value) {
	    send(formData("cancelaVenta",ventaArr[0].id_movimiento,motivo));
	  }
	})
}

function timerCarga(){
	if (timer==1) {
		send(formData("listenCarga","",cargaArr[0].id_movimiento));
		setTimeout("timerCarga()",1000);
	}else{
		//alert("acabado");
	}
}


function cargaEfectivo(){
	$("#ingresoDinero").modal({backdrop: 'static', keyboard: false});
	setTimeout("$('#loading').fadeOut()",1500);
	setTimeout("$('#loading').hide()",1500);
	setTimeout("$('#carga').fadeIn()",1900);
	setTimeout("$('#controls').fadeIn()",2500);

	cargaArr[0].movimiento="CARGA";
	send(formData("cargaEfectivo",JSON.stringify(cargaArr)));
}

function ingresoManual(){
	$("#ingresaManual").modal({backdrop: 'static', keyboard: false});
	setTimeout("$('#loading-load').fadeOut()",1500);
	setTimeout("$('#carga-load').fadeIn()",1900);
	setTimeout("$('#controls-load').fadeIn()",2500);

	cargaArr[0].movimiento="MANUAL";
	//send(formData("cargaEfectivo","",JSON.stringify(cargaArr)));
}

function ingresoEfectivo(){
	$("#ingresoDinero").modal({backdrop: 'static', keyboard: false});
	setTimeout("$('#loading').fadeOut()",1500);
	setTimeout("$('#carga').fadeIn()",1900);
	setTimeout("$('#controls').fadeIn()",2500);

	cargaArr[0].movimiento="INGRESO";
	send(formData("cargaEfectivo",JSON.stringify(cargaArr)));
}


function retiroEfectivo(){
	$("#retiroDiv").fadeOut();
	$("#controlsRetiro").fadeOut();
	setTimeout("$('#loadingRetiro').fadeIn()",400);
	cargaArr[0].movimiento="RETIRO-CONTROL";
	formValidate("retiro");
}

function retirarBolsa(){
	send(formData("retiroBolsa",''));
}
function lecturaDispositivos(){
	$("#leerDispositivos").modal({backdrop: 'static', keyboard: false});
	send(formData("lecturaDispositivos",''));
	//send(flushForm('retiro','retiro'))
}



function tablareporte(tabla,arr){
	//console.log(arr);
	var tbody=$("#"+tabla);
	for(var i=0; i<arr.length;i++){
		var row=$("<tr></tr>");

		var folio=$("<td></td>").text(arr[i].id_movimiento);
		var nombre=$("<td></td>").text(arr[i].nombre);
		var fecha=$("<td></td>").text(arr[i].fecha_creacion);
		var total=$("<td></td>").text("$"+parseFloat(arr[i].total).toFixed(2));
		var ingresado=$("<td></td>").text("$"+parseFloat(arr[i].ingresado).toFixed(2));
		var cambio=$("<td></td>").text("$"+parseFloat(arr[i].cambio).toFixed(2));
		var productos=$("<td></td>").text(arr[i].productos);
		if (arr[i].entregado==1) {
			entregadoText="Entregado";
		}else{
			entregadoText="No";
		}
		var entregado=$("<td></td>").text(entregadoText);
		var reim="none";
		if (arr[i].entregado==1) {
			reim="block";
		}

		

		row.append(folio);
		row.append(nombre);
		row.append(fecha);
		var fcancelacion="";
		if(typeof(arr[i].fecha_modificacion)!="undefined"){
			var cancelacion=$("<td></td>").text(arr[i].fecha_modificacion);
			fcancelacion=arr[i].fecha_modificacion;
			row.append(cancelacion);
			row.append(total);
			row.append(ingresado);
			row.append(cambio);
			row.append(productos.css("text-align","center"));
			tipo="CANCELACIÓN";
		}else{
			tipo="VENTA";
			row.append(total);
			row.append(ingresado);
			row.append(cambio);
			row.append(productos.css("text-align","center"));
		}
		var reimprimir=$("<td></td>").html("<input type='button' class='btn btn-sm btn-primary btn-block' value='Ver Detalles'  data-toggle='modal' data-target='#detalle' onclick='hide("+'"'+reim+'"'+","+arr[i].id_movimiento+","+'"'+arr[i].fecha_creacion+'","'+tipo+'","'+fcancelacion+'"'+");send(formData("+'"detalleTicket","","'+arr[i].id_movimiento+'"'+"))'>");
		row.append(reimprimir);

		tbody.append(row);
	}
}


function tablareporteEventos(tabla,arr){
	//console.log(arr);
	var tbody=$("#"+tabla);
	for(var i=0; i<arr.length;i++){
		var row=$("<tr></tr>");

		var folio=$("<td></td>").text(arr[i].id_movimiento);
		var movimiento=$("<td></td>").text(arr[i].tipo_movimiento);
		var fecha=$("<td></td>").text(arr[i].fecha_creacion);
		
		var tipo=arr[i].tipo_movimiento;
		reim="";

		var reimprimir=$("<td></td>").html("<input type='button' class='btn btn-sm btn-primary btn-block' value='Ver Detalles'  data-toggle='modal' data-target='#detalle' onclick='hide("+'"'+reim+'"'+","+arr[i].id_movimiento+","+'"'+arr[i].fecha_creacion+'"'+',"'+tipo+'"'+");send(formData("+'"detalleTicketEvento","","'+arr[i].id_movimiento+'"'+"))'>");

		row.append(folio);
		row.append(movimiento);
		row.append(fecha);
		
		row.append(reimprimir);

		tbody.append(row);
	}
}

function cerrarSesion(){
	if ($("#ingresado").val()>0) {
		cancelarVenta('USUARIO');
	}else{
	  	location.href="venta";
	  }
}

function initKeyboard(input,type){
	$('#keyboard').unbind().removeData();
	$('#keyboard').hide();
	
	$('#keyboard').jkeyboard({
      layout: type,
      input: $('#'+input)
    });
    $('#keyboard').show();
}

function initKeyboardCustom(input,type,id_div){
	$('#'+id_div).unbind().removeData();
	$('#'+id_div).hide();
	
	$('#'+id_div).jkeyboard({
      layout: type,
      input: $('#'+input)
    });
    $('#'+id_div).show();
}

function modal_edit(arr){
	$("#id_producto-edit").val(arr.id_productos);
	$("#key_product-edit").val(arr.clave_articulo);
	$("#description-edit").val(arr.descripcion);
	$("#category-edit").val(arr.id_categoria);
	$("#seleccion-edit").val(arr.selecciones);
	$("#precio-edit").val(arr.precio);
	$("#estatus-edit").val(arr.estatus);
	if (arr.etiquetas!=null) {
		$("#tags-edit").tagsinput("add",arr.etiquetas.replace(/[|]/g,","));
	}
	
	$('#edit-modal').modal();
	var spl=arr.selecciones.split(",");
	$(".planogram").removeClass("selectedS");
	for (var i = 0; i < spl.length; i++) {
		$("#sel-"+spl[i]).addClass("selectedS");
	}
}

function modal_edit_category(arr){
	$("#name_category-edit").val(arr.nombre_categoria);
	$("#id_categoria").val(arr.id_categoria);

	if (arr.cantidad==0) {
		$("#btn-delete").show();
	}else{
		$("#btn-delete").hide();
	}
	$('#edit-modal').modal();

}

function editReports(arr){
	$("#id_reporte").val(arr.id_conf);
	$("#reporte").val(arr.valor_conf);
	$('#editReporte').modal();
}

function generateReport(arr){
	$("#id_reporte").val(arr.id_conf);
	$("#reporte").val(arr.valor_conf);
	$('#generateReport').modal();
}


function retiroProcess(maxval,operacion,input){
		actual=$("#retiro-"+input).val();


		switch (operacion){
			case "+":
				if ((parseInt(actual)+1)<=maxval) {
					$("#retiro-"+input).val(parseInt(actual)+1);
					$("#fin-"+input).text("");
					$("#fin-"+input).text(parseInt(maxval)-parseInt($("#retiro-"+input).val()));
					$('#btn-'+input).removeClass("btn-danger");
					$('#btn-'+input).addClass("btn-warning");

					if ($("#retiro-"+input).val()==maxval) {
						$('#btn-'+input).addClass("btn-danger");
						$('#btn-'+input).removeClass("btn-default");
					}
				}
			break;
			
			case "-":
				if ((parseInt(actual)-1)>=0) {
					$("#retiro-"+input).val(parseInt(actual)-1);
					$("#fin-"+input).text(parseInt(maxval)-parseInt($("#retiro-"+input).val()));
					$('#btn-'+input).removeClass("btn-danger");
					$('#btn-'+input).addClass("btn-warning");


					if ($("#retiro-"+input).val()==0) {
						$('#btn-'+input).removeClass("btn-danger");
						$('#btn-'+input).removeClass("btn-warning");
						$('#btn-'+input).addClass("btn-default");
					}
				}
			break;

			case "todo":
				if ($('#retiro-'+input).val()>0) {
					$('#retiro-'+input).val(0);
					$('#fin-'+input).text("");
					$("#fin-"+input).text(parseInt(maxval)+parseInt($("#retiro-"+input).val()));
					$('#btn-'+input).removeClass("btn-danger");
					$('#btn-'+input).removeClass("btn-warning");
					$('#btn-'+input).addClass("btn-default");
				}else{
					if (maxval!=0) {
						$('#retiro-'+input).val(maxval);
						$('#fin-'+input).text("");
						$("#fin-"+input).text(parseInt(maxval)-parseInt($("#retiro-"+input).val()));
						$('#btn-'+input).addClass("btn-danger");
						$('#btn-'+input).removeClass("btn-default");
					}
					
				}
				
			break; 



		}
	}



function showPrice(data){
	$("#imagen-venta").attr("src","app/assets/img/products/"+data.imagen);
	$("#sku-venta").text(data.clave_articulo);
	$("#desc-venta").text(data.descripcion);

	/*Ticket*/
	$("#ticketProducto").text(data.clave_articulo);
	$("#ticketDescripcion").text(data.descripcion);
	$("#labelPrice").text("$ "+formatNumber.new(parseFloat(data.precio).toFixed(2)));
	$("#id_product").val(data.id_productos);
	$("#labelPricesku").text(data.clave_articulo);

	$(".check").addClass("hide");
	$("#check-"+data.id_productos).toggleClass("hide");
	
	$(".compraBtn").removeClass("selected");
	$("#btn-"+data.id_productos).toggleClass("selected");
	send(formData('revisaNiveles',data.precio));
}

function initProcess(type){
	
		if ($("#id_product").val()>0) {
			
				switch(type){
					case 'cash':
						if (exacto==0) {
						$("#proceso_venta").modal({backdrop: 'static', keyboard: false}); 
						formValidate("startProcessCash");
						}else{

							

							Swal.fire({
							  	title: 'Maquina sin Cambio',
							  	text: 'Solo acepta importe exacto',
							  	imageUrl: '/app/assets/img/sys/icons/no-money.png',
							  	imageWidth: 100,
							  	imageAlt: 'Sin cambio',
							  	animation: false,
							  	showCancelButton: true,
								confirmButtonText: 'Si, adelante!',
								cancelButtonText: 'No, cancela',
								reverseButtons: true
							}).then((result) => {
								  if (result.value) {
								    $("#proceso_venta").modal({backdrop: 'static', keyboard: false}); 
									formValidate("startProcessCash");
								  } else if (
								    result.dismiss === Swal.DismissReason.cancel
								  ) {
								  	location.reload();
								  }
								})
							

						}
					break; 
					case 'cashless':
							$(".bill-bar").hide();
							$(".cashless-bar").fadeIn();
						$("#proceso_venta").modal({backdrop: 'static', keyboard: false});
						flipCoin(); 
						formValidate("startProcessCashless");  
					break;
				}
			
		}else{
			swal("Alerta","Elige por lo menos un producto","warning");
		}
	
	
	
}

function cargaManual(maxval,operacion,input){
		actual=$("#manual-"+input).val();


		switch (operacion){
			case "+":
					$("#manual-"+input).val(parseInt(actual)+1);
					$("#fin-manual-"+input).text("");
					$("#fin-manual-"+input).text(parseInt(maxval)+parseInt($("#manual-"+input).val()));
					$('#btn-'+input).removeClass("btn-danger");
					$('#btn-'+input).addClass("btn-warning");

					if ($("#manual-"+input).val()==maxval) {
						$('#btn-'+input).addClass("btn-danger");
						$('#btn-'+input).removeClass("btn-default");
					}
				
			break;
			
			case "-":
				if ((parseInt(actual)-1)>=0) {
					$("#manual-"+input).val(parseInt(actual)-1);
					$("#fin-manual-"+input).text(parseInt(maxval)+parseInt($("#manual-"+input).val()));
					$('#btn-'+input).removeClass("btn-danger");
					$('#btn-'+input).addClass("btn-warning");


					if ($("#manual-"+input).val()==0) {
						$('#btn-'+input).removeClass("btn-danger");
						$('#btn-'+input).removeClass("btn-warning");
						$('#btn-'+input).addClass("btn-default");
					}
				}
			break;
		}
	}

	function muestra(id){
		$(".data").hide();
		$(".tab").removeClass("active");
		$("#menu-"+id).addClass("active");
		$("#data-"+id).show();
	}

	function billetesAceptados(arr){
		$(".billetes").hide();
		$(".aceptados").fadeIn();
		
		if (arr==false) {
			$(".exacto").show();
			exacto=1;
		}else{
			exacto=0;
			var spl=arr.split(",");
			for(var i=0;i<spl.length-1;i++){
				$("."+spl[i]).show();
			}
		}
		

	}

	function timeout(arr){
		$(".progress").fadeIn();
		porcentaje=(parseFloat(arr.timeout)*100)/(timeoutGeneral);
		counter_timeOut=porcentaje;
		switch(arr.type){
			case 'start':
				$("#progressbar").css({'width':(porcentaje+"%")});
			break;
			case 'resta':
				$("#progressbar").css({'width':(porcentaje+"%")});
			break;
		}
		
		return true;

	}

	function control(){
	counter_panel++;
	if (counter_panel>15) {
		if (counter_panel==20) {
			swal({
			  title: 'Direccionando . . .',
			  html: 'Espera, accediendo a panel de control',
			  timer: 1500,
			  showConfirmButton: false,
			  allowOutsideClick: false,
			  onOpen: () => {
			    swal.showLoading()
			    timerInterval = setInterval(() => {
			      swal.getContent().querySelector('strong')
			        .textContent = swal.getTimerLeft()
			    }, 100)
			  },
			  onClose: () => {
			    clearInterval(timerInterval)
			  }
			}).then((result) => {
			  if (
			    // Read more about handling dismissals
			    result.dismiss === swal.DismissReason.timer
			  ) {
			    location.href='login'
			  }
			})
		}
	}


}

function deleteProduct(){
	swal({
		title: 'Eliminar',
		text: "Estas a punto de eliminar una producto",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Proceder'

		}).then((result) => {
		if (result.value) {
			formValidate('delete-product');
		}
	})
	
}

function fillSelecciones(data){
	$("#cve_prod").text(data.clave_articulo);
	$("#desc_prod").text(data.descripcion);
	$("#sel").text(data.seleccion);
	$("#id_seleccion").val(data.id_seleccion);
	$("#stock").val(data.stock);
	$("#producto").val(data.producto);

	

	if (data.enable==1) {
		$('#enable').bootstrapToggle('on');
	}else{
		$('#enable').bootstrapToggle('off');
	}

	$("#enable").attr("onchange",'$(`#enable`).val($(this).prop(`checked`));if ($(`#enable`).val()==`true`) {$(`#stock`).val(`'+data.stock_default+'`);}else{$(`#stock`).val(`0`);}');
	
}

function selectSel(id_seleccion,input){
	var selecciones=$("#"+input).val();
	var spl=selecciones.split(",");
	var found=false;
	if (spl.indexOf(id_seleccion)!=-1) {
		spl.splice(spl.indexOf(id_seleccion),1);
		console.log(spl);

		var elementos="";
		for (var i = 0; i < spl.length; i++) {
			if (i==spl.length-1) {
				elementos+=spl[i];
			}else{
				elementos+=spl[i]+",";
			}

		}
		$("#"+input).val(elementos);
	}else{
		if ($("#"+input).val()=="") {
			$("#"+input).val(id_seleccion);
		}else{
			$("#"+input).val($("#"+input).val()+","+id_seleccion);
		}
	}
}


function editUser(arr){
	$("#id_usuario-edit").val(arr.id_usuario);
	$("#nombreUsuario-edit").val(arr.nombre);
	$("#nickname-edit").val(arr.user);
	$("#contrasenia-edit").val("notthistimehackerboy");
	$("#confirmar-edit").val("notthistimehackerboy");
	$("#rol-edit").val(arr.rol);
	$("#userEdit").modal();
}

function deleteUser(user){
	swal({
		title: 'Eliminar',
		text: "Estas a punto de eliminar un Usuario",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Proceder'

		}).then((result) => {
		if (result.value) {
			send(formData('userDelete',user));
		}
	})

}


function format(input){
	var num = input.value.replace(/\./g,'');
	num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
	num = num.split('').reverse().join('').replace(/^[\.]/,'');
	input.value = num;
}
