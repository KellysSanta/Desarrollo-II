<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Redsocial IN - Contactos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	<link href="css/contactosstyle.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="img/rs.png">
  <?php 
  include "conexion.php";
  $usuario = $_POST["user"];
   $nombre = $_POST["bNombre"];
   $universidad= $_POST["bUniversidad"];?>
	
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
									<small>Busqueda de Usuarios</small>			
								</h1>

						</div>
					</div>

				<div class="cuadros">

						<?php buscarContactoNombre($nombre, $universidad,$usuario);?>
				</div>
			</div>
				
		</div>
	</div>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</body>
</html>

			
