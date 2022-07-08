function getData(option,id,identifier){
	var handler= new FormData();
	handler.append("handler",option);
	handler.append("id",id);
	handler.append("identifier",identifier);
	return handler;
}

function flushForm(input,handler){
	var elementos = $("."+input);
	var form = new FormData();
	var j=0;
	for (var i=0; i<elementos.length; i++) {
		if (elementos[i].id=="image"||elementos[i].id=="datasheet") {
			form.append(elementos[i].id,elementos[i].files[0]);
		}
			form.append(elementos[i].id,elementos[i].value);
		
		
	    
	}
	form.append("handler",handler)
	return form;
}

function send(datos){
	$.ajax({
		url:   '../handler/ajax.handler.class.php',
		type:  'POST',
		dataType: "html",
		data:  datos,
		processData: false,
		contentType: false,
		cache: false,
		beforeSend: function () {
		        
		},
		success:  function (response) {
			
			var res=response.split("|");
			
			if (/^[\]:{}\,s]*$/.test(res[0].replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) 
			{
			  	var arr=JSON.parse(res[0]);
				if (arr.hasOwnProperty("no")==true) {errorNo(arr);}else{
					switch (res[res.length-1]){
					 	case "formload":
							loadInput(JSON.parse(res[0]));
						break;

						case "dataGrid":
						costoTotal(JSON.parse(res[0]));
						addGrid(JSON.parse(res[0]));
						
							break;

						case "gridPostLoad":
							gridPostLoad(JSON.parse(res[0]),res[res.length-1]);
						break;
					}

				}
		

			}else{
				console.log(res);
			 switch (res[res.length-1]){
			 	
				 	case "autocomplete":
					var auto=res[0].split(",");
					$("#serie").autocomplete({source: auto});

					default:

						$("#"+res[res.length-1]).html(res[0]);
					break;
				}

			}
			

			
			
			
		}
	});
}




function loadInput(arr){
		$(".imp").each(function(){
			var valor=this.id;
			console.log(arr[0][valor]);
			if (document.getElementById(valor).type!="file") {
				
				$(this).val((arr[0][valor]));
			}
        });

        $(".input").each(function(){
			var valor=this.id;
			console.log(arr[0][valor]);
			if (document.getElementById(valor).type!="file") {
				
				$(this).val((arr[0][valor]));
			}
        });
	 //$("#editar").show("swing")
}

function fill(data){
	var spl=data.split("|");
	var identifier=spl[spl.length-1];
	borrarSelect(document.getElementById(identifier));

	for (var i = 0; i<=spl.length -2; i++){
		var com= spl[i].split(",");
	    var opt = document.createElement('option');
	    opt.value = com[0];
	    opt.innerHTML = com[1];
	    document.getElementById(identifier).appendChild(opt);
	}

}

function borrarSelect(sel){
	try{
		for (var i=sel.length; i >0;  i--){sel.options[i]=null;}
	}catch(e){alert(e);}
}


function mostrar(input){
	
	$("#mostrar").text(input.value);
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

function paintValidation(color,input){
	input.css("background-color","#"+color);
}

function errorNo(arr){
	switch(arr.no){
		case 1062:
			$("#flash").text("Error! ID duplicado en sistema.").addClass("error");
		break;
		
		default:
		if ($("#flash")[0]) {
			$("#flash").text(arr.result).addClass(arr.type);
		}else{
			alert(arr.result);
		}
		
		
			
		break;
		
	}
}

function reset(){
	$(".imp").toggleClass("notnull input");
	$("#flash").text("");
	$(".input").val("");
	$("#mensaje").text("");
	$("#mensaje").append($("<input type='button'></input>").addClass("btn btn-warning btn-block").attr("onclick","if (validar()==true) { send(flushForm('input','addMaquina'))}").val("Guardar"))
}

function gridPostLoad(arr,input){
	var theaders=["#","Marca","Modelo","SKU","Categoria","Estatus","Publicar"];
	var table=$("#gridPostLoad");
	var tbody=$("<tbody></tbody>");
	var thead=$("<thead></thead>");
	var trow=$("<tr></tr>");
	for(var h=0;h<theaders.length;h++){

		trow.append($("<td></td>").text(theaders[h]));
	}
	thead.append(trow);

	for(var i=0;i<arr.length;i++){
		var row=$("<tr></tr>");
		var numero=$("<td></td>").text("#"+parseInt(i+1));
		var marca=$("<td></td>").text(arr[i].marca);
		var modelo=$("<td></td>").text(arr[i].modelo);
		var sku=$("<td></td>").text(arr[i].sku);
		var categoria=$("<td></td>").text(arr[i].categoria);

		
		if (arr[i].estatus_publicacion!=null) {
			var estatus=$("<td></td>");
			var select =$("<select></select>").attr("onchange","updateEstatus('estatus_publicacion',this.value,"+arr[i].id_post+")").attr("id",arr[i].sku+"input").addClass("form-control");
				select.append($("<option value='0'>Inactivo</option>"));
				select.append($("<option value='1'>Activo</option>"));
				select.val(arr[i].estatus_publicacion);
				estatus.append(select);


			var publicar=$("<input type='button'></input>").addClass("btn btn-success btn-block").val("Actualizar").attr("data-toggle","modal").attr("data-target","#postModal").attr("onclick","$('#actualizar').show();$('#publicar').hide();$('#id_marca').val("+arr[i].id_marca+");$('#sku').val('"+arr[i].sku+"');send(flushForm('load','loadUpdatePost'));$('.check').show();$('.imp').removeClass('notnull input');");
		}else{
			var publicar=$("<input type='button'></input>").addClass("btn btn-primary btn-block").val("Publicar").attr("data-toggle","modal").attr("data-target","#postModal").attr("onclick","$('#actualizar').hide();$('#publicar').show();$('#id_marca').val("+arr[i].id_marca+");$('#sku').val('"+arr[i].sku+"');$('.check').hide()");
			var estatus=$("<td></td>").text("Inactivo");
		}
		


		row.append(numero);
		row.append(marca);
		row.append(modelo);
		row.append(sku);
		row.append(categoria);
		row.append(estatus);
		row.append(publicar);
		tbody.append(row);
	}
	
	table.append(thead);
	table.append(tbody);

	table.tablesorter({theme:"dropbox",	widgets: ['zebra','filter']});
}

function updateEstatus(campo,valor,id){
	var form=new FormData;
	form.append("id_post",id);
	form.append(campo,valor);
	form.append("handler","updateEstatusPost");
	send(form);
}


function updatecheck(input){
	$("#"+input).toggleClass("notnull input");
}

function addText(text){
if ($("#categoria").val()!="") {
	var text=$("#categoria").val()+","+text;
}
	$("#categoria").val(text);
}


function addGrid(arr){

if (globalArray.length>0) {
	for(var i=0;i<globalArray.length;i++){
		if (globalArray[i].id_producto==arr[0].id_producto) {
			globalArray[i].cantidad=parseInt(globalArray[i].cantidad)+parseInt($("#cantidad").val());
		}else{
			arr[0].cantidad=parseInt($("#cantidad").val());
			globalArray.push(arr);
			arraytoGrid(globalArray);
		}
	}

	}else{	
			arr[0].cantidad=parseInt($("#cantidad").val());
			globalArray.push(arr);
			arraytoGrid(globalArray);
			
	}

	
}


function arraytoGrid(arr){
	var tbody=$("#dataGrid");
	tbody.text("");
	for(var i=0;i<arr.length;i++){
				var row=$("<tr></tr>");
				for (var key in arr[i]) {

					var col=$("<td></td>");
					if (arr[i][key]==null) {
						col.text("0");
					}else{
						col.text(arr[i][key]);
					}
					
					row.append(col);
				}
				tbody.append(row)
			}
			return row;

}

function costoTotal(arr){
	for(var i=0;i<arr.length;i++){
				var row=$("<tr></tr>");
				for (var key in arr[i]) {
					console.log(key+" "+arr[i][key]);
				}
			}
}

function deshabilitaOption(){
	/*$("#"+select+" option").each(function(){
   	for(var i=0;i<arr.length;i++){
   	}
	});*/
	$("#tipo option[value='"+$("#tipo").val()+"']").attr("disabled","disabled");

	$('#producto')
    .find('option')
    .remove()
    .end()
    .append('<option value="">Selecciona para agregar</option>');

    
}