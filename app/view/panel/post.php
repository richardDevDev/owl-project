<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

error_reporting(-1);
// No mostrar los errores de PHP
error_reporting(0);
// Motrar todos los errores de PHP
error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['sesion'][0]["id_user"])){
header("Location: ../../../control");
exit;}

ini_set('error_reporting', E_ALL);
require "../../controller/includes.php";
$obj=new includes;
$obj::_includePHP();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Owl Desarrollos Panel de Control</title>

		<meta charset="UTF-8">
		<meta name="description" content="Owl Desarrollos">
		<meta name="keywords" content="Vending, BoardVending">
		<meta name="author" content="Developer: Ivan Mendez, Graphic Designer: Octavio García">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--No guardar cache para cambios rapidos en el sitio 
		<meta http-equiv="Expires" content="0">
		<meta http-equiv="Last-Modified" content="0">
		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
		<meta http-equiv="Pragma" content="no-cache">-->
</head>
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<link rel="stylesheet" type="text/css" href="../css/theme.dropbox.css">
		<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
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
	        <a class="nav-link" href="edit" >Editar</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link active" href="post">Publicar</a>
	      </li>
	      
	    </ul>
	    
	  </div>
	</nav>
	

	  		
	  		<div class="col-12">
	  			<div class="title"><label>Publicar Marcas en Sitio web</label></div>
  				<br>
  				<table class="table table-hover table-striped" id="gridPostLoad">
  				
				  
				</table>
	  		</div>

</div>
  	<footer id="footer" class="footer col-12">
      <div class="footer-body text-center">
       Copyright 2018 Owl Desarrollos.
      </div>
    </footer>


    <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="postModal">Agregar Datos para Publicar</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group row">
			  <label for="example-text-input" class="col-3 col-form-label">Descripción (Galería de Productos)</label>
			  <div class="col-8 input-group">
			    <textarea type="text" rows=4 class="form-control notnull input imp" id="caption" placeholder=""></textarea>
			    <div class="input-group-addon" id="valcaption"></div>
			  </div>
			  	<div class="checkbox col-1">
				  <input type="checkbox" onchange="updatecheck('caption')"  class="check">
				</div>

			</div>

			<div class="form-group row">
			  <label for="example-text-input" class="col-3 col-form-label">Detalles Técnicos</label>
			  <div class="col-8 input-group">
			    <textarea type="text" rows=5 class="form-control notnull input imp" id="content" placeholder=""></textarea>
			    <div class="input-group-addon" id="valcontent"></div>
			  </div>
			  <div class="checkbox col-1">
				  <input type="checkbox" class="check" onchange="updatecheck('content')">
				</div>
			</div>

			<div class="form-group row">
			  <label for="example-text-input" class="col-3 col-form-label">Aplicaciones</label>
			  <div class="col-8 input-group">
			    <textarea type="file" rows="6" class="form-control notnull input imp" id="applications" placeholder=""></textarea>
			    <div class="input-group-addon" id="valapplications"></div>
			  </div>
			  <div class="checkbox col-1">
				  <input type="checkbox" class="check" onchange="updatecheck('applications')">
				</div>
			</div>

			<div class="form-group row">
			  <label for="example-text-input" class="col-3 col-form-label">Etiquetas</label>
			  <div class="col-8 input-group">
			    <input type="text" class="form-control notnull input imp" id="tags" placeholder="Refacciones,Minivending,etc"></textarea>
			    <div class="input-group-addon" id="valtags"></div>
			  </div>
			  <div class="checkbox col-1">
				  <input type="checkbox" class="check" onchange="updatecheck('tags')">
				</div>
			</div>

			<div class="form-group row">
			  <label for="example-text-input" class="col-3 col-form-label">Imagen</label>
			  <div class="col-8 input-group">
			    <input type="file" onchange="mostrar(this)" class="form-control notnull input imp" id="image" placeholder="" accept="image/jpeg">
			    <div class="input-group-addon" id="valimage"></div>
			  </div>
			  <div class="checkbox col-1">
				  <input type="checkbox" class="check" onchange="updatecheck('image')">
				</div>
			</div>


			<div class="form-group row">
			  <label for="example-text-input" class="col-3 col-form-label">Ficha Técnica</label>
			  <div class="col-8 input-group">
			    <input type="file" onchange="mostrar(this)" class="form-control notnull input imp" id="datasheet" placeholder="" accept="application/pdf">
			    <div class="input-group-addon" id="valdatasheet"></div>
			  </div>
			  <div class="checkbox col-1">
				  <input type="checkbox" class="check" onchange="updatecheck('datasheet')">
				</div>
			</div>

			<div class="form-group row">
			  <label for="example-text-input" class="col-3 col-form-label">Estatus</label>
			  <div class="col-8 input-group">
			    <select class="form-control notnull input imp" id="estatus_publicacion">
			    	<option value="1">Publicar</option>
			    	<option value="0">Borrador</option>
			    </select>

			    <input type="hidden" class="form-control input" id="date_upload" value="curdate()">
			    <input type="hidden" class="form-control input" id="id_marca">
			    <input type="hidden" class="form-control input load" id="sku">

			    <div class="input-group-addon" id="valestatus_publicacion"></div>
			  </div>
			  <div class="checkbox col-1">
				  <input type="checkbox"  class="check" onchange="updatecheck('estatus_publicacion')">
				</div>
			</div>

	      </div>
	      <div class="form-group row">
					  <div class="col-10 offset-2" id="flash">
					  </div>
					</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <input id="publicar" type="button" class="btn btn-primary" value="Publicar" onclick="if (validar()==true) { send(flushForm('input','addPost'))}" style="display: none">

	        <input id="actualizar" type="button" class="btn btn-primary" value="Guardar Cambios" onclick="if (validar()==true) { send(flushForm('input','updatePost'))}" style="display: none">
	      </div>
	    </div>
	  </div>
	</div>

</body>
<script src="../../../js/jquery-3.2.1.min.js"></script>
<script src="../../../js/popper.js"></script>
<script src="../../../js/bootstrap.js"></script>
<script src="../js/functions.js"></script>
<script src="../js/jquery.tablesorter.min.js"></script>
<script src="../js/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript">
	
	send(getData("prepost","","gridPostLoad"));
</script>
</html>