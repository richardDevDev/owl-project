<!DOCTYPE html>
<html>
<head>
	<title>Distribuidores</title>

		<meta charset="UTF-8">
		<meta name="description" content="Distribuidores">
		<meta name="keywords" content="Vending, BoardVending">
		<meta name="author" content="Developer: Ivan Mendez, Graphic Designer: Octavio García">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--No guardar cache para cambios rapidos en el sitio 
		<meta http-equiv="Expires" content="0">
		<meta http-equiv="Last-Modified" content="0">
		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
		<meta http-equiv="Pragma" content="no-cache">-->
</head>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<body>


	<!--Se muestra el Menú-->
	<?php include "app/view/sections/menu.php";?>



  	<div class="banner" style="text-align: center;">
  		<div class="row distribuidores"><img src="img/distribuidores.jpg" class="img-fluid height: auto;"></div>
  		<div class="offset-1 text-left">
  			
  		</div>

  			<form class="offset-2 col-8">
  					<div class="title text-left">Envianos tus datos:</div>
  					<div class="form-group row ">
					  <label for="example-text-input" class="col-2 col-form-label">Nombre</label>
					  <div class="col-10 input-group">
					  	<input type="hidden" class="mail" id="localizacion" value="Distribuidor">
					    <input type="email" class="form-control notnull mail" id="nombre" placeholder="Tu nombre">
					    <div class="input-group-addon" id="valnombre"></div>
					  </div>
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Empresa</label>
					  <div class="col-10 input-group">
					    <input type="text" class="form-control mail" id="empresa" placeholder="Opcional">
					    <div class="input-group-addon" id="valempresa"></div>
					  </div>
					  
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Telefono</label>
					  <div class="col-10 input-group">
					    <input type="text" class="form-control notnull mail" id="telefono" placeholder="Nosotros te llamamos">
					    <div class="input-group-addon" id="valtelefono"></div>
					  </div>
					  
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Correo</label>
					  <div class="col-10 input-group">
					    <input type="text" class="form-control notnull mail" id="email" placeholder="ejemplo@empresa.com">
					    <input type="hidden" class="form-control notnull mail" id="comentario" value="distribuidor">
					    <div class="input-group-addon" id="valemail"></div>
					  </div>
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">&nbsp;</label>
					  <div class="col-10 input-group">
					    <div class="g-recaptcha" data-sitekey="6LfXtFAUAAAAADzwwKUnw7FCT0yw8qQ5LZMPEH6N"></div>
					    <div class="input-group-addon" id="captcha"></div>
					  </div>
					  
					</div>

					
				  
					<div class="form-group row">
					  <div class="col-3 offset-2" id="mensaje">
					    <input type="button" class="btn btn-success btn-block" onclick="if (validar()==true) { if(recaptchaVerify()==true){sendMail(flushForm('mail'))}}" value="Enviar">
					  </div>
					</div>


				  
				</form>
  		
  	</div>


	  	<?php include "app/view/sections/footer.php";?>

</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/owl.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</html>