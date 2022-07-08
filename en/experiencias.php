<!DOCTYPE html>
<html>
<head>
	<title>Experiencias</title>

		<meta charset="UTF-8">
		<meta name="description" content="Experiencias">
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

  	<div class="videos" style="text-align: center;">
  		<div class="row">
  			<div class="col-8 offset-2">
  				<iframe id="player" 
					src="https://www.youtube.com/embed/4v_3n5ezpyE">
				</iframe>
  			</div>
  		</div>
  		<div class="row offset-1 col-10">
  			<!--Video lockers-->
  			<div class="col-4 video-thumb"><a href="#" onclick="$('#player').attr('src','https://www.youtube.com/embed/4v_3n5ezpyE?autoplay=1')">
  				<img width="90%" src="img/thumbnails/thumb-lockers.jpg"><div class="title">Lockers Automatizados</div></a>
  			</div>
  			<!--Video Maquina de cambio-->
  			<div class="col-4"><a href="#" onclick="$('#player').attr('src','https://www.youtube.com/embed/tFPXScHYRxs?autoplay=1')">
  				<img width="90%" src="img/thumbnails/thumb-h2.jpg"><div class="title">Máquina de Cambio</div></a>
  			</div>
  			<!--Video activaciones-->
  			<div class="col-4"><a href="#" onclick="$('#player').attr('src','https://www.youtube.com/embed/XnjG3tHMcBo?autoplay=1')">
  				<img width="90%" src="img/thumbnails/thumb-activaciones.jpg"><div class="title">Maquina Vending de Activaciones</div></a>
  			</div>

  		</div>

  		<!--Agregar mas videos-->
  		<div class="row offset-1 col-10">
  			<!--Video 1-->
  			<div class="col-4 video-thumb"><a href="#" onclick="$('#player').attr('src','https://www.youtube.com/embed/link_aca?autoplay=1')">
  				<img width="90%" src=""><div class="title"><!--Titulo aqui--></div></a>
  			</div>

  			<!--Video 2-->
  			<div class="col-4 video-thumb"><a href="#" onclick="$('#player').attr('src','https://www.youtube.com/embed/link_aca?autoplay=1')">
  				<img width="90%" src=""><div class="title"><!--Titulo aqui--></div></a>
  			</div>

  			<!--Video 3-->
  			<div class="col-4 video-thumb"><a href="#" onclick="$('#player').attr('src','https://www.youtube.com/embed/link_aca?autoplay=1')">
  				<img width="90%" src=""><div class="title"><!--Titulo aqui--></div></a>
  			</div>
  			

  			

  		</div>


  		</div>
  	</div>

	  	<?php include "app/view/sections/footer.php";?>

</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/owl.js"></script>
</html>