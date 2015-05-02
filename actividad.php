<!DOCTYPE html>
  <?php $usuario = $_GET["usuario"];
  include "conexion.php";?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Redsocial IN - Actividad</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/contactosstyle.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="img/rs.png">

	
</head>

<body>


	<div class="container">

		<nav>

		<ul class="menu_principal">
			<li class="active"><a class="principal" href="perfil.php">Perfil</a></li>
			<li class="derecha active"><a class="principal" href="logout.php">Salir</a></li>
		</ul>

		</nav>


		<div class="contenido">
			<div class="columna1">
				<div class="cuadros">
						<div class="logo">
							<img class="img-circulo" alt="140x140" src="img/foto.png">
						</div>
						<div class="nombre">
								<h1>
									<small>Lista de Contactos</small>			
								</h1>

						</div>
					</div>

				<div class="cuadros">

						<?php listarContactos($usuario);?>
						<div class="sesion_formulario">
							<label class="label2">Nombre:</label>
							<input class="input" id="inputAmigo" type="text">
						</div>
						<div class="sesion_formulario">
							<label class="label2">Fecha-hora:</label>
							<input class="input" id="inputAmigo" type="text">
						</div>
						<h5>(yyyy/mm/dd hh:mm:ss)</h5>
						<div class="sesion_formulario">
							<label class="label2">Lugar:</label>
							<input class="input" id="inputAmigo" type="text">
						</div>
						<div class="sesion_formulario">
							<label class="label2">Descripción:</label>
							<input class="input" id="inputAmigo" type="text">
						</div>
						<div class="sesion_formulario">
							<button type="submit" class="boton">Editar</button>
							<button type="submit" class="boton">Eliminar</button>
						</div>
				</div>
			</div>
				
		</div>
	</div>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</body>
</html>

			