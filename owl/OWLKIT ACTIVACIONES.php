<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

error_reporting(-1);
// No mostrar los errores de PHP
error_reporting(0);
// Motrar todos los errores de PHP
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

include_once "../app/controller/includes.php";
$_includes=new includes;
$_includes->_includeCMS();

$post=new post;
$data=$post->loadPost(str_replace(".php","",basename(__FILE__ )));

          
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data[0]["marca"]." ".$data[0]["modelo"]; ?></title>

		
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta name="description" content=<?php echo "'". $data[0]["caption"]."'" ?>>
		<meta name="keywords" content=<?php echo "'". $data[0]["tags"]."'"?>>
		<meta name="author" content="Developer: Ivan Mendez, Graphic Designer: Octavio García">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--No guardar cache para cambios rapidos en el sitio 
		<meta http-equiv="Expires" content="0">
		<meta http-equiv="Last-Modified" content="0">
		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
		<meta http-equiv="Pragma" content="no-cache">-->
</head>
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<body>

	<!--Se muestra el Menú-->
	<?php include "../app/view/sections/menu-productos.php";?>
  		<div class="row">
  			<div class="col-12 col-md-3 menu ">
  				
  				<div class="navlat navbar menu-lateral navbar-toggleable-md  bg-faded">
				  
				  <div class=" navbar-collapse" id="navbarNavDropdown">
				    <ul class="navbar-nav">
				      <li class="nav-item active">
				        <a class="nav-link" href="../productos"><span><img src="img/nada.png" width="13%"></span>Ver Todo <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="../productos?cat=2"><span><img src="img/tradicional.png" width="13%"></span>Tradicional</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="../productos?cat=3"><span><img src="img/industrial.png" width="13%"></span>Industrial</a>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="../productos?cat=4" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          <span><img src="img/especializado.png" width="13%"></span>Especializado
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				          <a class="dropdown-item" href="../productos?cat=5">Module Integration</a>
				          <a class="dropdown-item" href="../productos?cat=6">Payment System Action</a>
				        </div>
				      </li>

				      <li class="nav-item">
				        <a class="nav-link" href="../productos?cat=7"><span><img src="img/servicio.png" width="13%"></span>Servicios</a>
				      </li>

				    </ul>
				  </div>
				</div>

  			</div>
  			<div class="col-12 col-md-8">
  				
  				<div class="product">
  						<div class="row">
  							<div class="col-12 col-md-7 product-image">
  								<img src=<?php
  								echo "'img/".$data[0]["image"]."'"; ?>>
  							</div>
  							<div class="col-12 col-md-5 product-data">
  								<div class="product-title"><?php echo $data[0]["marca"]." ".$data[0]["modelo"]; ?></div>
  								<div class="sku">SKU: <?php echo $data[0]["sku"]; ?></div>
  								
  								<div class="content"><?php echo $data[0]["content"]?></div>


  								<div class="datasheet"><?php if($data[0]["datasheet"]!=""){echo "<a href='#' data-toggle='modal' data-target='#ficha'>Bajar ficha técnica</a>";}else{echo "Ficha Técnica no Disponible";}?> </div>
  								
  								<div class="posted">Publicado el <?php echo $data[0]["date_upload"]?></div>
  							</div>
  						</div>
  						<div class="detalles text-justify">
  							<div class="title"><label>Aplicaciones:</label></div>
  							<p><?php echo $data[0]["applications"] ?></p>
  						</div>
  				</div>
  			</div>
  		</div>
  		
  		

  	

  	<!--Se muestra footer -->
	<?php include "../app/view/sections/footer-productos.php";?>


    <div class="modal fade" id="ficha" tabindex="-1" role="dialog">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"><?php echo $data[0]["marca"]." ".$data[0]["modelo"]; ?></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="graph-outline">
			 <object data=<?php echo "'datasheet/".$data[0]["datasheet"]."'"?> type="application/pdf" width="100%" height="800px"> 
			  <p>Parece que no usas un Plugin para visualizar PDF, puedes descargar esta ficha tecnica desde aqui: <a href=<?php echo "'datasheet/".$data[0]["datasheet"]."'"?>>Click para descargar Ficha Tecnica.</a></p>  
			 </object>
			 </div>
	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar esta ventana</button>
	      </div>
	    </div>
	  </div>
	</div>

</body>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/owl.js"></script>
</html>