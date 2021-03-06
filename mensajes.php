<!DOCTYPE html>
<?php 
$usuario = $_REQUEST["user"];
$password =  $_REQUEST["password"];
include "conexion.php";?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Redsocial IN - Men/Not</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/mensajesstyle.css" rel="stylesheet">

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
			<li class="active"><a class="principal seleccionado" href="mensajes.php">Mensajes/Notificaciones</a></li>
			<li class="active"><a class="principal" href="eventos.php">Eventos</a></li>
			<li class="active"><a class="principal" href="grupos.php">Grupos</a></li>
			<li class="derecha active"><a class="principal" href="logout.php">Salir</a></li>
		</ul>

	</nav>


	<div class="contenido">
		<div class="columna1">
			<div class="cuadros">
					<div class=logo>
						<img class="img-circulo" alt="140x140" src="img/foto.png">
					</div>
					<div class="nombre">
							<h1>
								<small>Mensajes/Notificaciones</small>			
							</h1>

					</div>
					Cantidad de Mensajes y Notificaciones Nuevas: <?php $cantidad=cantidadMensajes($usuario); echo "$cantidad"; ?>
			</div>
			

			<nav>
				<ul class="menu_principal">
					<li>
						<h4>Mensajes</h4>
							
					</li>
					<li class="derecha active">
						<?php echo"<a class='principal'  href='mensajesEnviados.php?user=$usuario&password=$password''>Enviados</a>"?>
					</li>
					<li class="derecha active">
						<a class="principal" id="ver_consultar" href="#">Recibidos</a>
					</li>
					<li class="derecha active">
						<a class="principal" id="ver_ocultos" href="#">Ocultos</a>
					</li>
					<li class="derecha active">
						<a class="principal" id="ver_pospuestos" href="#">Pospuestos</a>
					</li>
				</ul>
			</nav>

			<div class="cuadros" id="mensajes_pospuestos">
				<h3>Mensajes Pospuestos
				</h3>

					<?php mensajesPospuestos($usuario); ?>
			</div>

			<div class="cuadros" id="mensajes_ocultos">
				<h3>Mensajes Ocultos
				</h3>
					<?php mensajesOcultos($usuario); ?>
			</div>

			<div class="cuadros" id="mensajes_consultar">
				<h3>Consultar Mensajes
				</h3>
					<?php mensajesRecibidos($usuario); ?>
			</div>

			
				<div class="cuadros">
					<form role="form" name="enviomensajes" action="actualizatabla.php" method="post">	
						<div class="sesion_formulario">
								<label class="label2">Correo Destinatario:</label>
								<input type="text" name="destino" placeholder="Usuarios separados por ;">
						</div>
						<div class="sesion_formulario">		
								<label class="label2">Mensaje</label>
									<textarea class="cuerpo_mensaje" name="mensaje"> 
									</textarea>	
					    </div>
						<input type="hidden" name="tabla" value="nuevomensaje">
						<?php echo"<input type='hidden' name='origen' value='$usuario'>";?>
						
						<div class="sesion_formulario">	
								<button type="submit"  class="eniar_mensaje boton">Enviar Mensaje</button>
						</div>
				    </form>
				</div>
			

			<nav>

					<ul class="menu_principal">
						<li>
							<h4>Notificacion Eventos</h4> 
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_eve_consultar" href="#">Consultar</a>
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_eve_ocultos" href="#">Ocultos</a>
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_eve_pospuestos" href="#">Pospuestos</a>
						</li>
					</ul>
			</nav>

			<div class="cuadros" id="eventos_pospuestos">
				<h3>Notificaciónes Pospuestas
				</h3>
					<?php notificacionEventosPospuestos($usuario);?>
			</div>

			<div class="cuadros" id="eventos_ocultos">
				<h3>Notificaciones Ocultas
				</h3>
					<?php notificacionEventosOcultos($usuario);?>
			</div>

			<div class="cuadros" id="eventos_consultar">
				<h3>Consultar Notificaciones
				</h3>
					<?php notificacionEventos($usuario);?>
			</div>
			

			<br>

				<nav>
					<ul class="menu_principal">
						<li>
							<h4>Notificacion Grupos</h4> 
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_gru_consultar" href="#">Consultar</a>
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_gru_ocultos" href="#">Ocultos</a>
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_gru_pospuestos" href="#">Pospuestos</a>
						</li>
					</ul>
				</nav>

				<div class="cuadros" id="grupos_pospuestos">
					<h3>Notificaciónes Pospuestas
					</h3>
						<?php notificacionGruposPospuestos($usuario);?>
				</div>

				<div class="cuadros" id="grupos_ocultos">
					<h3>Notificaciones Ocultas
					</h3>
						<?php notificacionGruposOcultos($usuario);?>
				</div>

				<div class="cuadros" id="grupos_consultar">
					<h3>Consultar Notificaciones
					</h3>
						<?php notificacionGrupos($usuario);?>
				</div>
			
		</div>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="js/mensajesscripts.js"></script>
</body>
</html>

			
