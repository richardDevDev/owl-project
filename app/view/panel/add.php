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
	        <a class="nav-link active" href="add">Agregar</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="edit" >Editar</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="post">Publicar</a>
	      </li>
	      
	    </ul>
	    
	  </div>
	</nav>
	

  	<div id="panel" class="col-10 offset-1">
  		<div class="row">
	  		<div class="col-12">
	  			<div class="title"><label>Agregar Marcas para Publicar</label></div>
  				<br>
  				<form>

  					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Marca</label>
					  <div class="col-10 input-group">
					    <select class="form-control notnull input" id="marca">
					    	<?php
					    		echo $html::option($controller::centroCostos());
					    	?>
					    </select>
					    <div class="input-group-addon" id="valmarca"></div>
					  </div>
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Modelo</label>
					  <div class="col-10 input-group">
					    <input type="text" class="form-control notnull input" id="modelo" placeholder="Nombre de Modelo">
					    <div class="input-group-addon" id="valmodelo"></div>
					  </div>
					</div>
					
					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Categoria</label>
					  <div class="col-5">
							<table class="categorias table table-striped table-hover">
								<tr onclick="addText('2')"><td>2</td><td>Tradicional</td></tr>
								<tr onclick="addText('3')"><td>3</td><td>Industrial</td></tr>
								<tr onclick="addText('4')"><td>4</td><td>Especializada</td></tr>
								<tr onclick="addText('5')"><td>5</td><td>MI Module Integration</td></tr>
								<tr onclick="addText('6')"><td>6</td><td>PSA Payment System Action</td></tr>
								<tr onclick="addText('7')"><td>7</td><td>Servicios</td></tr>
								<tr onclick="addText('8')"><td>8</td><td>Refaccion</td></tr>
							</table>
						</div>
					  <div class="col-5 input-group">
					     <input type="text" class="form-control notnull input" id="categoria" placeholder="Click en las categorias disponibles de la Izq.">
					    <div class="input-group-addon" id="valmarca"></div>
					  </div>
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Precio Compra</label>
					  <div class="col-10 input-group">
					    <input type="text" class="form-control notnull input" id="compra" placeholder="9999">
					    <div class="input-group-addon" id="valcompra"></div>
					  </div>
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Impuesto</label>
					  <div class="col-10 input-group">
					    <input type="text" class="form-control notnull input" id="impuesto" placeholder="16">
					    <div class="input-group-addon" id="valimpuesto"></div>
					  </div>
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Utilidad %</label>
					  <div class="col-10 input-group">
					    <input type="text" class="form-control notnull input" id="utilidad" placeholder="50">
					    <div class="input-group-addon" id="valutilidad"></div>
					  </div>
					</div>

					<div class="form-group row">
					  <label for="example-text-input" class="col-2 col-form-label">Tipo</label>
					  <div class="col-10 input-group">
					    <select class="form-control notnull input" id="tipo">
					    	<?php
					    		echo $html::option($controller::catalogoSistema(4));
					    	?>
					    </select>
					    <div class="input-group-addon" id="valtipo"></div>
					  </div>
					</div>



					
					
					
					

				

					<div class="form-group row">
					  <div class="col-10 offset-2" id="flash">
					    
					  </div>
					</div>
				  
					<div class="form-group row">
					  <div class="col-10 offset-2" id="mensaje">
					    <input type="button" class="btn btn-warning btn-block" onclick="if (validar()==true) { send(flushForm('input','addMaquina'))}" value="Guardar">
					  </div>
					</div>

					<div class="form-group row">
					  <div class="col-10 offset-2">
					    <input type="button" class="btn btn-success btn-block" onclick="reset()" value="Reset">
					  </div>
					</div>
					

				  <div class="form-group">
				    
				  </div>
				  
				</form>
	  		</div>
  		</div>
  		
  	</div>

</div>
  	<footer id="footer" class="footer col-12">
      <div class="footer-body text-center">
       Copyright 2018 Owl Desarrollos.
      </div>
    </footer>

</body>
<script src="../../../js/jquery-3.2.1.min.js"></script>
<script src="../../../js/popper.js"></script>
<script src="../../../js/bootstrap.js"></script>
<script src="../js/functions.js"></script>
</html>