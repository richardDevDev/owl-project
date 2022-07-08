<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<body>

	<div class="login-box col-md-4 offset-md-4 col-8 offset-2" style="margin-top: 10vh">
		<form id="log" class="form form-horizontal col-10 offset-1">
			<div class="input-group image"><center><img class="rounded" src="img/menu/logo 2.png" width="80%"></center></div>
			<div class="input-group"><h3>Authenticate</h3></div>
			<div class="form-group">
				<div class="input-group">
					
					<input id="user" type="input" class="form-control notnull input" placeholder="User">
					<span class="input-group-addon" id="valuser"></span>
				</div>
			</div>

			<div class="form-group">
				<div class="input-group">
					
					<input id="pass" type="password" class="form-control notnull input" placeholder="Password">
					<span class="input-group-addon" id="valpass"></span>
				</div>
			</div>

			<div class="form-group">
				
				<div class="">

					<input type="submit" class="btn btn-warning btn-block" value="Login">
				</div>
			</div>

			

			
					<div id="mensajes" style="display: none; font-size: 20px"></div>
				
			</div>
		</form>
	</div>

	<div class="form-group footer fixed-bottom">
		<div class="col-4  offset-4 text-center">
			<div class="copyright">Owl Desarrollos 2018.</div>
		</div>
	</div>

</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/login.js"></script>
<script src="js/bootstrap.js"></script>
</html>