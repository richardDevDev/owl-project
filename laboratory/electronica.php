<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Documentación de proyectos</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">OWL Desarrollos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
             <li class="nav-item">
              	<a class="nav-link" href="proyectos.php"> Proyectos </a>
            </li>
            <li class="nav-item">
              	<a class="nav-link" href="programacion.php"> Programación </a>
            </li>
            <li class="nav-item">
              	<a class="nav-link" href="mecanica.php"> Mecánica </a>
            </li>
            <li class="nav-item">
              	<a class="nav-link" href="electronica.php"> Electrónica </a>
            </li>
             <li class="nav-item">
              	<a class="nav-link" href="mision.php"> Misión </a>
            </li>
             <li class="nav-item">
              	<a class="nav-link" href="vision.php">Visión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Portafolio</h1>
          
          <div class="list-group">
          	<a href="telstock-locker/index.html" class="list-group-item">Telstock Integración</a>
          	<a href="foldio_project/index.html" class="list-group-item">Proyecto Foldio</a>
            <a href="#" class="list-group-item">Kiosco Rosticeria</a>
            <a href="#" class="list-group-item">WS API SmartPay</a>
            <a href="#" class="list-group-item">Sistema Industrial</a>
             <a href="#" class="list-group-item">Loli 7 in</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

         <header class="masthead">
	      <div class="header-content">
	        <div class="header-content-inner">
	          <br>
	          <h1 id="homeHeading">¿Como desarrollamos la electrónica y árneses de una máquina?</h1>
	          <hr>
	          <p>El core electrónico de OWL desarrollos esta sobre 3 modulos de control:</p>
	          <p> <strong>1.</strong> BoardDroid: Tarjeta de control para maquinas expendedoras (la más completa) </p>
	          <p> <strong>2.</strong> SensDroid: Tarjetas que le permiten saber a Boardroid la caida de los productos </p>
	          <p> <strong> BoardDroid y SensDroid siempre trabajan juntos</strong></p>
	          <p> <strong>3.</strong> Pulsos: Esta tarjeta permite convertir el protocolo MDB (Protocolo de 
	          los dispositivos de cobro) a salidas de relevador. </p>
	          <p> <strong>4.</strong> EVC: Prmite convertir el protocolo MDB para poder se controlado desde una aplicación de 
	          escritorio mediante un puerto USB-Serial virtual. </p>
	        
			  <p> <strong> Es importante mencionar que el Hardware (Tarjeta electrónica) se puede reutilizar en diferentes
			  proyectos, sin embargo el Firmware (software) dependera de cada aplicación particular. En caso de que alguno de los
			  firmware de producción no cumpla con los requerimientos se procede a un servicio de programación.</strong></p>
	        
	          <a href="#"><img src="img/read.png" height="561" width="725" alt=""></a>
	        
	        <br>
	        
	        <p>En caso de que una de las tarjeta anteriores no se pueda ocupar para el proyecto se pone a consideración del cliente
	        el diseño electrónico de una tarjeta nueva, como ejemplo tenemos el resultado del diseño electronico de la 
	        tarjeta BoardDRoid 2.0 que se puede apreciar en la siguiente imagen:</p>
	        
	        
			<a href="#"><img src="img/phases3.png" height="561" width="725" alt=""></a>
	        
	        <br><br>
	        
	        <p>Los árneses al igual que las tarjetas se deben de considerar al momento de diseñar una máquina
	        expendedora y/o projecto con sistemas de cobro, ya que estos son lo que le permitiran a todos los
	        elementos electronicos comunicarse entre si para un fin común. A continuación se muestra un ejemplo 
	        de desarrollo de árneses para una ventana de venta de agua, al momento de tener el diseño mecanicos y
	        conocer los accesorios que tendra la máquina se puede realizar el diseño de los árneses, dependiendo
	        tipos de señales, uso y condiciones de operación.</p>
	        
	        <br>
	        
	        <a href="#"><img src="img/arnes1.png" alt=""></a>
	        
	        <b></b><b></b>
	        
	        <p> <strong> Proceso final: </strong> en conclusión la parte electronica viene enlazada con la parte de árneses
	        ya que uno sin el otro no funcionan pra la operación deseada de cada uno, en la siguiente imagen se puede apreciar
	        la tarjeta de pulsos con el desarrollo de árnese, en este proyecto solo se desarrollaron árneses ya que se reutilizo
	        la electronica.</p>
	        
	        <br>
	        
	        <a href="#"><img src="img/arnes2.png" height="227" width="509" alt=""></a>
	        
	        
	        
	        
	        
	        </div>
	      </div>
	    </header>

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->
      
    </div>
    <!-- /.container -->

    
    
    
    
	<br>
    <br>
    <br>
    
    <!-- Footer -->
    <footer class="py-5 navbar-custom">
      <div class="container">
        <p class="m-0 text-center text-white">OWL Desarrollos &copy; www.owldesarrollos.com</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
