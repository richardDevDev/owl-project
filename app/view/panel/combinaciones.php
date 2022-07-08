<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

error_reporting(-1);
// No mostrar los errores de PHP
error_reporting(0);
// Motrar todos los errores de PHP
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

session_start();
if(!isset($_SESSION['sesion'][0]["id_user"])){
header("Location: ../../../control");
exit;}

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
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
<body id="inicio">
	<nav class="navbar sticky-top  navbar-expand-md navbar-dark bg-dark col-12">
	  <a class="navbar-brand" href="http://www.owldesarrollos.com/productos">
	    <img src="/img/menu/logo 2.png" width="50%">
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse " id="navbarSupportedContent">
	  	<ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link active"><?php echo $_SESSION['sesion'][0]["nombre"] ?></a>
	      </li>
	    </ul>
	    <ul class="navbar-nav ml-auto">
	     
	      <li class="nav-item">
	        <a class="nav-link" href="add">Agregar</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link active" href="edit" >Editar</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="post">Publicar</a>
	      </li>
	      
	    </ul>
	    
	  </div>
	</nav>
	

  	<div id="panel" class="col-10 offset-1">
  		<div class="title">Armar producto FINAL Básico</div>
  		<div class="row">
  			<div class="col-4">
  				<form class="form">
  					<div class="form-group row">
					  <label for="example-text-input" class="col-form-label">Producto</label>
					  <div class=" input-group">
					    <select class="form-control notnull input" id="marca">
					    	<?php
					    		echo $html::option($controller::optionCombos());
					    	?>
					    </select>
					    <div class="input-group-addon" id="valmarca"></div>
					  </div>
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-form-label">Tipo de Producto</label>
					  <div class=" input-group">
					    <select class="form-control notnull productos" onchange="send(getData('producto',this.value,'producto'))" id="tipo">
					    	<?php
					    		echo $html::option($controller::catalogoSistema(4));
					    	?>
					    </select>
					    <div class="input-group-addon" id="valtipo"></div>
					  </div>
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-form-label">Selecciona</label>
					  <div class=" input-group">
					    <select class="form-control notnull input" id="producto">
					    	<option value="">Selecciona para agregar</option>
					    </select>
					    <div class="input-group-addon" id="valproducto"></div>
					  </div>
					</div>


  				</form>
  			</div>
  			<div class="col-8">
  				<table class="table table-striped table-hover">
  					<thead><tr><td>ID</td><td>Proveedor</td><td>Modelo</td><td>Precio de Compra</td><td>Impuesto</td><td>Utlidad</td></tr></thead>
  					<tbody id="dataGrid"></tbody>
  				</table>

  				<br>
  				<table class="table table-striped table-hover">
  					<thead><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Precio de Compra</td><td>Impuesto</td><td>Utlidad</td></tr></thead>
  					<tbody id="dataGrid"></tbody>
  				</table>
  			</div>
  			<input type="button" class="btn btn-primary" onclick="send(getData('datosProducto',$('#producto').val(),'dataGrid'));console.log(globalArray);deshabilitaOption();" value="Valores">
  		</div>
  		
  	</div>

</div>
  	<footer id="footer" class="footer fixed-bottom col-12">
      <div class="footer-body text-center">
       Copyright 2018 Owl Desarrollos.
      </div>
    </footer>

</body>
<script src="../../../js/jquery-3.2.1.min.js"></script>
<script src="../../../js/popper.js"></script>
<script src="../../../js/bootstrap.js"></script>
<script src="../js/functions.js"></script>
<script src="../js/jquery-ui.js"></script>
<script type="text/javascript">
	var globalArray=new Array();
	//send(getData("autocomplete","","serie"));
</script>
</html>