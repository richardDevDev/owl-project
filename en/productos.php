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


	<!--Se muestra el Menú-->
	<?php include "app/view/sections/menu.php";?>

	<div id="servicios" class="row">
  			<div class="col-12 col-md-3 menu">
  				
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
				      <li class="nav-item">
				        <a class="nav-link" href="productos?cat=8"><span><img src="img/servicio.png" width="13%"></span>Accesorios</a>
				      </li>

				    </ul>
				  </div>
				</div>

  			</div>
  			<div class="col-12 col-md-9">

  				<?php $i=0;
  				if (isset($_GET["cat"])) {
  					echo "<img class='banner-product' src='img/productos/".$_GET["cat"].".jpg' width=102%; style='margin-left:-15px;margin-right:15px'>";
  				}else{
  					echo "<img class='banner-product' src='img/productos/2.jpg' width=102%; style='margin-left:-15px;margin-right:15px'>";
  					
  				}
  				
  				echo "<div class='row'>";
  				if (isset($data["no"])) {
  					echo "<div class='error text-center'>".$data["result"]."</div>";
  				}else{
  					foreach($data as $key=>$value){
  					echo "
  					<div class='product col-3'>
						<div class='product-thumbnail'>
							<a href='owl/".$data[$key]["sku"]."'><img width='100%' src='owl/img/".$data[$key]['image']."'></a>
						</div>
						<div class='product-data'>
							<a href='owl/".$data[$key]["sku"]."'><div class='product-title'>".$data[$key]['marca'].' '.$data[$key]['modelo']."</a></div>
							<div class='caption'>".$data[$key]['caption']."</div>
							<div class='sku'>SKU: ".$data[$key]['sku']."</div>
							
						</div>
  					</div>";

  					if ($i==4) {
  						echo "</div><<div class='row'>";
  					}


  				}
  				}
  				 echo "</div>";?>
  					
  			</div>
  		
  		
  	</div>
  	

  	<?php include "app/view/sections/footer.php";?>



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