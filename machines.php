<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Proximamente...</title>
</head>
<style type="text/css">
	@font-face {
	  font-family: Roboto;
	  src: url('fonts/Roboto-Regular.ttf');
	}
	.all {
		min-height: 90vh;
		width: 100%;
	}
	body {
		margin: 0;
		padding: 0;
		font-family: Roboto;
		background: url(img/background.png) #efefef;
		background-size: 100%;
		font-size:0.9rem;
	}
	.lineSup{
		width: 100%;
		height: 3px;
		background-color:#D59534;
	}
	.middle {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		font-weight: bold;
		font-size: 2rem;
		text-align: center;
	}
	.footer {
		background: #343434;
		padding:10px;
		color: white;
		margin: 0;
		border-top:2px solid #D59534;
		padding:1rem 4rem;
	}
	.modulo {
		float:left;
		width: 25%;
	}
	.modulo ul, li {
		list-style: none;
		padding: 0;
	}
	a {
		color: #fff;
		text-decoration: none;
	}
	a:hover {
		text-decoration: underline;
	}
</style>
<body>
<div class="all">
<div class="lineSup"></div>
<div class="middle" style="text-align: center;">
	<div style="width:250pt; margin:0 auto;">
		<img src="img/menu/logo 3.png" width="100%">
	</div><br />
	<div style="font-size:3rem;">En Mantenimiento</div><br/>Proximamente</div>
</div>
<div class="footer">
	<div class="modulo">
		<span style="color:#D59534; font-weight:bold;">Mapa del Sitio</span>
		<ul>
			<li><a href="index">Inicio</a></li>
			<li><a href="nosotros">Nosotros</a></li>
			<li><a href="productos">Productos</a></li>
			<li><a href="proyectos">Experiencias</a></li>
			<li><a href="contacto">Contacto</a></li>
		</ul>
	</div>
	<div class="modulo">
		<span style="color:#D59534; font-weight:bold;">Soluciones</span>
		<ul>
			<li><a href="productos?cat=2">Tradicional</a></li>
			<li><a href="productos?cat=3">Industrial</a></li>
			<li><a href="productos?cat=4">Especializado</a></li>
			<li><a href="productos?cat=7">Servicios</a></li>
		</ul>
	</div>
	<div class="modulo">
		<span style="color:#D59534; font-weight:bold;">Contacto</span>
		<div style="padding-top:1rem;">Av 16 de Septiembre #70-C Col. Fraccionamiento Industrial Alce Blanco Naucalpan de Juarez, Edo. de Mexico,C.P. 53370 <br />Telefono <br />(55) 5395 9822</div>
	</div>
	<div class="modulo">
	</div>
	<div style="clear:both; text-align:center; margin-top:2rem; width:100%;">&copy; OwlDesarrollos, Todos los derechos reservados</div>
</div>
</body>
</html>