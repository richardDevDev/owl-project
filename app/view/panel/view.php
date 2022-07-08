<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

error_reporting(-1);
// No mostrar los errores de PHP
error_reporting(0);
// Motrar todos los errores de PHP
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

require "../../controller/includes.php";
$obj=new includes;
$obj::_includePHP();

$controller=new controllerAdd;
$html=new handler;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Mercado Vending</title>

		<meta charset="UTF-8">
		<meta name="description" content="Owl Desarrollos">
		<meta name="keywords" content="Vending, BoardVending">
		<meta name="author" content="Developer: Ivan Mendez, Graphic Designer: Octavio García">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--No guardar cache para cambios rapidos en el sitio -->
		<meta http-equiv="Expires" content="0">
		<meta http-equiv="Last-Modified" content="0">
		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
		<meta http-equiv="Pragma" content="no-cache">
</head>
		<link rel="stylesheet" type="text/css" href="../../../css/styles.css">
		<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
<body id="inicio">
	<nav class="navbar sticky-top  navbar-expand-md navbar-dark bg-dark col-12">
	  <a class="navbar-brand" href="#">
	    <img src="/img/menu/logo.png" width="50%">
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse " id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item">
	        <a class="nav-link active" href="mercado.owldesarrollos.com">mercadovending.com <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="add">Agregar</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="edit" >Editar</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="post">Publicar</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link active" href="view">Ver Todo</a>
	      </li>
	      
	    </ul>
	    
	  </div>
	</nav>
	

  	<div id="servicios" class="col-10 offset-1">
  		<div class="row">
  			<div class="col-2">
	  			<label>Ordenar</label>
	  			<ul>
	  				<li>Precio</li>
	  				<li>Fecha</li>
	  				<li>Marca</li>
	  				<li>Modelo</li>

	  			</ul>

  		</div>
  		<div class="col-10">
  			<div class="title"><label>Ver todo en Inventario</label></div>
				<br>
				
				<table class="table table-hover table-striped">
				  <?php
				$arr="Serie,Producto,Modelo,Software,Precio de Compra, Precio de Venta,Layout";
				$html::tableBody($controller::allProducts(),$arr);
				
				?>
				</table>

  		</div>
  		</div>
  		
  		
  		
  	</div>

</div>
  	<footer id="footer" class="footer col-12">
      <div class="footer-body text-center">
       Copyright 2018 Mercado Vending.
      </div>
    </footer>

</body>
<script src="../../../js/jquery-3.2.1.min.js"></script>
<script src="../../../js/popper.js"></script>
<script src="../../../js/bootstrap.js"></script>
<script src="../../../js/mercado.js"></script>
</html>