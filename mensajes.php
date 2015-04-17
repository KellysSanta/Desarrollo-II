<!DOCTYPE html>
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
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
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
				<li class="active">
					<a class="principal" href="#">Perfil</a>
				</li>
				<li class="active">
					<a class="principal seleccionado" href="#">Mensajes/Notificaciones</a>
				</li>
				<li class="active">
					<a class="principal" href="#">Eventos</a>
				</li>
				<li class="active">
					<a class="principal" href="#">Grupos</a>
				</li>
				<li class="derecha active">
					<a class="principal" href="#">Salir</a>
				</li>
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
								Mensajes/Notificaciones			
							</h1>

					</div>
			</div>
			

			<nav>
				<ul class="menu_principal">
					<li>
						<h4>Mensajes</h4>
					</li>
					<li class="derecha active">
						<a class="principal" id="ver_consultar" href="#">Consultar</a>
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
					<div class="sesion_formulario">
							<label class="label2">Usuario</label>
					</div>		
					<div class="sesion_formulario">
							<label class="label2">Mensaje</label>
					</div>	
					<div class="sesion_formulario">
							<button type="submit"  class="ocultar_mensaje boton">Ocultar</button>
							<button type="submit"  class="no_posponer_mensaje boton">No posponer mas</button>
							<button type="submit"  class="Eliminar_mensaje boton">Eliminar</button>
					</div>
			</div>

			<div class="cuadros" id="mensajes_ocultos">
				<h3>Mensajes Ocultos
				</h3>
					<div class="sesion_formulario">
							<label class="label2">Usuario</label>
					</div>		
					<div class="sesion_formulario">
							<label class="label2">Mensaje</label>
					</div>	
					<div class="sesion_formulario">
							<button type="submit"  class="no_ocultar_mensaje boton">No ocultar mas</button>
							<button type="submit"  class="posponer_mensaje boton">Posponer</button>
							<button type="submit"  class="Eliminar_mensaje boton">Eliminar</button>
					</div>
			</div>

			<div class="cuadros" id="mensajes_consultar">
				<h3>Consultar Mensajes
				</h3>
					<div class="sesion_formulario">
							<label class="label2">Usuario</label>
					</div>		
					<div class="sesion_formulario">
							<label class="label2">Mensaje</label>
					</div>	
					<div class="sesion_formulario">
							<button type="submit"  class="ocultar_mensaje boton">Ocultar</button>
							<button type="submit"  class="posponer_mensaje boton">Posponer</button>
							<button type="submit"  class="Eliminar_mensaje boton">Eliminar</button>
					</div>
			</div>

			
				<div class="cuadros">
					<form role="form" >	
						<div class="sesion_formulario">
								<label class="label2">Usuario (s)</label>
								<input class="input" type="text">
						</div>
						<div class="sesion_formulario">		
								<label class="label2">Mensaje</label>
									<textarea class="cuerpo_mensaje" NAME="Texto"> 
									</textarea>	
					    </div>
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
					<div class="sesion_formulario">
							<label class="label2">Evento</label>
					</div>		
					<div class="sesion_formulario">
							<label class="label2">Mensaje</label>
					</div>	
					<div class="sesion_formulario">
							<button type="submit"  class="ocultar_mensaje boton">Ocultar</button>
							<button type="submit"  class="no_posponer_mensaje boton">No posponer mas</button>
							<button type="submit"  class="Eliminar_mensaje btn boton">Eliminar</button>
					</div>
			</div>

			<div class="cuadros" id="eventos_ocultos">
				<h3>Notificaciones Ocultas
				</h3>
					<div class="sesion_formulario">
							<label class="label2">Evento</label>
					</div>		
					<div class="sesion_formulario">
							<label class="label2">Mensaje</label>
					</div>	
					<div class="sesion_formulario">
							<button type="submit"  class="no_ocultar_mensaje boton">No ocultar mas</button>
							<button type="submit"  class="posponer_mensaje boton">Posponer</button>
							<button type="submit"  class="Eliminar_mensaje boton">Eliminar</button>
					</div>
			</div>

			<div class="cuadros" id="eventos_consultar">
				<h3>Consultar Notificaciones
				</h3>
					<div class="sesion_formulario">
							<label class="label2">Evento</label>
					</div>		
					<div class="sesion_formulario">
							<label class="label2">Mensaje</label>
					</div>	
					<div class="sesion_formulario">
							<button type="submit"  class="ocultar_mensaje boton">Ocultar</button>
							<button type="submit"  class="posponer_mensaje boton">Posponer</button>
							<button type="submit"  class="Eliminar_mensaje boton">Eliminar</button>
					</div>
			</div>
			
			<div class="cuadros">
				<h3>Ultima Notificación
				</h3>
				<br>
				<div class="sesion_formulario">
					<label class="label2">Evento</label>
				</div>
				<div class="sesion_formulario">
					<label class="label2">Notificación</label>
				</div>
		   </div>




		   
		
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
						<div class="sesion_formulario">
								<label class="label2">Grupo</label>
						</div>		
						<div class="sesion_formulario">
								<label class="label2">Mensaje</label>
						</div>	
						<div class="sesion_formulario">
								<button type="submit"  class="ocultar_mensaje boton">Ocultar</button>
								<button type="submit"  class="no_posponer_mensaje boton">No posponer mas</button>
								<button type="submit"  class="Eliminar_mensaje boton">Eliminar</button>
						</div>
				</div>

				<div class="cuadros" id="grupos_ocultos">
					<h3>Notificaciones Ocultas
					</h3>
						<div class="sesion_formulario">
								<label class="label2">Grupo</label>
						</div>		
						<div class="sesion_formulario">
								<label class="label2">Mensaje</label>
						</div>	
						<div class="sesion_formulario">
								<button type="submit"  class="no_ocultar_mensaje boton">No ocultar mas</button>
								<button type="submit"  class="posponer_mensaje boton">Posponer</button>
								<button type="submit"  class="Eliminar_mensaje boton">Eliminar</button>
						</div>
				</div>

				<div class="cuadros" id="grupos_consultar">
					<h3>Consultar Notificaciones
					</h3>
						<div class="sesion_formulario">
								<label class="label2">Grupo</label>
						</div>		
						<div class="sesion_formulario">
								<label class="label2">Mensaje</label>
						</div>	
						<div class="sesion_formulario">
								<button type="submit"  class="ocultar_mensaje boton">Ocultar</button>
								<button type="submit"  class="posponer_mensaje boton">Posponer</button>
								<button type="submit"  class="Eliminar_mensaje boton">Eliminar</button>
						</div>
				</div>
			
				<div class="cuadros">
					<h3>Ultima Notificación
					</h3>
					<br>
					<div class="sesion_formulario">
						<label class="label2">Grupo</label>
					</div>
					<div class="sesion_formulario">
						<label class="label2">Notificación</label>
					</div>
				</div>
		</div>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="js/mensajesscripts.js"></script>
</body>
</html>

			
