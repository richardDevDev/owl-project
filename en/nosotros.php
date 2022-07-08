<!DOCTYPE html>
<html>
<head>
	<title>Nosotros</title>

		<meta charset="UTF-8">
		<meta name="description" content="Nosotros">
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




  	<div class="carousel-item col-12 active nosotros" >
	  <img id="mision-img" class="nosotros-img" src="img/nosotros/mision.jpg" alt="Mision Owl Desarrollos">
	  <div id="mision" class="carousel-caption d-none d-md-block" onmouseover="darken(this);" onmouseout="nodarken(this);">
	    <h3>MISIÓN</h3>
	    <p>Somos una empresa de manufactura y desarrollo<br>
	    	de máquinas y equipos automatizados construyendo<br>
	    	ideas de negocio con la más alta tecnología, agregando<br>
	    	valor de innovacion y calidad en cada producto.</p>
	  </div>
	</div>

	<div class="carousel-item col-12 active nosotros">
	  <img id="vision-img" class="nosotros-img" src="img/nosotros/vision.jpg" alt="Mision Owl Desarrollos">
	  <div id="vision" class="carousel-caption d-none d-md-block" onmouseover="darken(this);" onmouseout="nodarken(this);">
	    <h3>VISIÓN</h3>
	    <p>Ser la empresa de desarrollo en<br>
	    	automatización más importante de América<br>
	    	Latina con tecnología de vanguardia y productos<br>
	    	innovadores para las necesitades del<br>
	    	mercado actual.</p>
	  </div>
	</div>


	<div class="carousel-item col-12 active nosotros">
	  <img id="valores-img" class="nosotros-img" src="img/nosotros/valores.jpg" alt="Mision Owl Desarrollos">
	  <div id="valores" class="carousel-caption d-none d-md-block" onmouseover="darken(this);" onmouseout="nodarken(this);">
	    <h3>VALORES</h3>
	    <p>Ética, Actitud de Servicio<br>
	    	Profesionalismo, Originalidad<br>
	    	e Innovacion.<br></p>
	  </div>
	</div>

	  	<?php include "app/view/sections/footer.php";?>

</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/owl.js"></script>
</html>