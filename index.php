<?php
include ('Conexion/conexion.php');
$serverName = "PAVILION-GAMING"; //serverName\instanceName

// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( "Database"=>"biblio", "CharacterSet" => "UTF-8");

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Inicio de sesión</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
    <link href="stylesheet.css" rel="stylesheet">
</head>

<body class="login-page">
	<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Cuando se pone en modo mobile, se cambia el navbar por iconos de rayitas -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="#">Productos BD</a>
        	</div>

        	<div class="collpase navbar-collapse">
        		<ul class="nav navbar-nav navbar-right">
    				<li class="dropdown">
    					<a href="viewdatawithoutlogin.php" class="btn btn-primary btn-round">
    						<i class="material-icons">leaderboard</i> Ver datos
    					</a>
                    </li>
        		</ul>
        	</div>
    	</div>
    </nav>

	<div class="page-header header-filter">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<div class="card card-signup">
						<form class="form" method="post" action="controller.php">
							<div class="header header-primary text-center">
								<h3 class="card-title">Inicio de sesión</h3>
							</div>
							<p class="description text-center">Ingresa tus datos</p>

							<div class="card-content">
								<div class="input-group">
                                    <label for="idEmail"></label>
                                    <span class="input-group-addon">
										<i class="material-icons">email</i>
									</span>
									<input type="text" name="txtUsuario" class="form-control" id="idEmail" placeholder="Email (user)">
								</div>
								<div class="input-group">
                                    <label for="idPass"></label>
									<span class="input-group-addon">
										<i class="material-icons">password</i>
									</span>
									<input type="password" name="txtClave" id="idPass" placeholder="Contraseña" class="form-control" />
								</div>
							</div>
							<div class="footer text-center">
                                <input type="submit" value="Ingresar" class="btn btn-primary btn-simple btn-lg">
                                <a href="#" class="btn btn-primary btn-simple btn-wd">¿Olvido su contraseña?</a>
                                <hr>
                                <span>¿No tiene cuenta? <a href="#" class="btn btn-primary btn-simple btn-wd btn-lg">Registrarse</a></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer">
	        <div class="container">
	            <nav class="pull-left">
					<ul>
						<li>
							<a href="https://github.com/Werffios">
								Visitanos en GITHUB
							</a>
						</li>
						<li>
							<a href="http://unal.edu.co">
							   Acerca de nosotros
							</a>
						</li>
					</ul>
	            </nav>
	            <div class="copyright pull-right">
                    <label>
	                &copy; <script>document.write(new Date().getFullYear())</script>
                    , made with <i class="material-icons">favorite</i> by Nicolás Suárez
                    </label>
	            </div>
	        </div>
	    </footer>

	</div>

</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
	<script src="assets/js/moment.min.js"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
	<script src="assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
	<script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
	<script src="assets/js/bootstrap-tagsinput.js"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
	<script src="assets/js/jasny-bootstrap.min.js"></script>

	<!--    Plugin For Google Maps   -->
	<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

	<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
	<script src="assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>
</html>
