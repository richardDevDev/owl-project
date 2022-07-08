<!DOCTYPE html>
<html>
<head>
	<title>Contacto</title>

		<meta charset="UTF-8">
		<meta name="description" content="Contacto">
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

  	<div id="contacto" class="contacto col-10 offset-1">
  		
  		<div class="row">
  			<div class="col-md-4">
  				<div class="title"><label>Ubicacion</label></div>
  				<br>
  				<h4>Direccion</h4>
  				<p>
  					Av 16 de Septiembre #70-C<br>
  					Col. Fraccionamiento Industrial Alce Blanco<br>
  					C.P. 53370<br>
  					Naucalpan de Juarez, Estado de Mexico
  				</p>

  				<h4>Telefono</h4>
  				<p>
  					(55) 5395 9822
  				</p>
  				

  				<iframe class="map" 
				  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1880.8895476021014!2d-99.21915101694361!3d19.465088842845464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d202575acd79f5%3A0x6c8c72072589a69a!2sOwl+Desarrollos!5e0!3m2!1ses!2smx!4v1522774584985"
				  width="300" 
				  height="300" 
				  frameborder="0" 
				  style="border:0" 
				  allowfullscreen>
				  
				</iframe>
  			</div>
  			<div class="col-8">
  				<div class="title"><label>Contacto</label></div>
  				<br>
  				<form>

  					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Nombre</label>
					  <div class="col-10 input-group">
					  	<input type="hidden" class="mail" id="localizacion" value="Seccion Contacto">
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
					    <input type="text" class="form-control notnull mail" id="telefono" placeholder="Permitenos contactarte">
					    <div class="input-group-addon" id="valtelefono"></div>
					  </div>
					  
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Correo</label>
					  <div class="col-10 input-group">
					    <input type="text" class="form-control notnull mail" id="email" placeholder="ejemplo@empresa.com">
					    <div class="input-group-addon" id="valemail"></div>
					  </div>
					  
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Mensaje</label>
					  <div class="col-10 input-group">
					    <textarea rows="5" class="form-control notnull mail" id="comentario">Me gustaria ser contactado para saber mas de los productos disponibles, promociones y descuentos que me pueden ofrecer.</textarea>
					    <div class="input-group-addon" id="valcomentario"></div>
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
					  
					  <div class="col-10 offset-2" id="mensaje">
					    <input type="button" class="btn btn-success" onclick="if (validar()==true) { if(recaptchaVerify()==true){sendMail(flushForm('mail'))}}" value="CONTÁCTAME!">
					  </div>
					</div>

				  <div class="form-group">
				    
				  </div>
				  
				</form>
  			</div>
  		</div>
  		
  	</div>

  	<!--Se muestra footer -->
	<?php include "app/view/sections/footer.php";?>

</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/owl.js"></script>
<script src='https://www.google.com/recaptcha/api.js'>
</script>
</html>