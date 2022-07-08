<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

error_reporting(-1);
// No mostrar los errores de PHP
error_reporting(0);
// Motrar todos los errores de PHP
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

include_once "app/controller/includes.php";
$_includes=new includes;
$_includes::_include();

$post=new post;

if (isset($_GET["cat"])) {
	$data=$post->activePostCategoria($_GET["cat"]); 
}else{
	$data=$post->activePost(); 
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Productos</title>

		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta name="description" content="Productos">
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


	<nav class="navbar navbar-expand-md col-12">
	  <a class="navbar-brand" href="index.html">
	    <img src="/img/menu/logo 2.png" width="50%">
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"><img src="img/menu/menu-icon.png" width="90%"></span>
	  </button>



	  <div class="collapse navbar-collapse " id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item">
	        <a class="nav-link active" href="index">INICIO <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="nosotros">NOSOTROS</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="productos">PRODUCTOS</a>
	      </li>

	      <li class="nav-item">
	        <a class="nav-link" href="experiencias">EXPERIENCIAS</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="distribuidores">DISTRIBUIDORES</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="contacto">CONTACTO</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">&nbsp;</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">&nbsp;</a>
	      </li>
	    </ul>
	    
	  </div>
	  
	</nav>
	<div id="servicios" class="row">
  			
  			<div class="col-12 col-md-9">

  				
  					
  			</div>
  			
  			<div class="col-12 col-md-3 menu ">
  				
  				<div class="navlat navbar menu-lateral navbar-toggleable-md bg-faded">
				  
				  
				  <div class="navbar-collapse" id="navbarNavDropdown">
				    <ul class="navbar-nav">
				      <li class="nav-item active">
				        <a class="nav-link" href="productos"><span><img src="img/nada.png" width="13%"></span>Ver Todo <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="productos?cat=2"><span><img src="img/tradicional.png" width="13%"></span>Tradicional</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="productos?cat=3"><span><img src="img/industrial.png" width="13%"></span>Industrial</a>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="productos?cat=4" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          <span><img src="img/especializado.png" width="13%"></span>Especializado
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				          <a class="dropdown-item" href="productos?cat=5">Module Integration</a>
				          <a class="dropdown-item" href="productos?cat=6">Payment System Action</a>
				        </div>
				      </li>

				      <li class="nav-item">
				        <a class="nav-link" href="productos?cat=7"><span><img src="img/servicio.png" width="13%"></span>Servicios</a>
				      </li>

				    </ul>
				  </div>
				</div>

  			</div>
  		
  	</div>

  	

  	<footer class="footer col-12">
  		<div class="row footer-body">
  			<div class="col-3 mapa">
			      	<div class="foot-title">Mapa del Sitio</div>
			        <div class="foot-link"><a href="nosotros">Nosotros</a></div>
			        <div class="foot-link"><a href="productos">Productos</a></div>
			        <div class="foot-link"><a href="proyectos">Experiencias</a></div>
			        <div class="foot-link"><a href="contacto">Contacto</a></div>
  			</div>

  			<div class="col-3 categorias">
  					<div class="foot-title">Soluciones</div>
			        <div class="foot-link"><a href="productos?cat=2">Tradicional</a></div>
			        <div class="foot-link"><a href="productos?cat=3">Industrial</a></div>
			        <div class="foot-link"><a href="productos?cat=4">Especializado</a></div>
			        <div class="foot-link"><a href="productos?cat=7">Servicios</a></div>
  			</div>

  			<div class=" col-3">
  				<div class="foot-title">Contacto</div>
			        <div class="foot-info">
			  					Av 16 de Septiembre #70-A<br>
			  					Col. Fraccionamiento Industrial Alce Blanco<br>
			  					Naucalpan de Juarez, Edo. de Mexico,C.P. 53370<br>
			  					
			  				<p>

			  				Telefono<br>
			  					(55) 5395 9822
			        </div>
  			</div>
  		</div>

  		<div class="row copyright">
  			<div class="col-4"></div>
  			<div class="col-4 text-center">Owl Desarrollos Copyright 2018.</div>
  			<div class="col-4"></div>
  		</div>
      
    </footer>



    <div class="modal fade" id="ficha" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Titulo</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Contenido</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/owl.js"></script>
</html>