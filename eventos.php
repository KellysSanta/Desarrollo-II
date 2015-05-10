<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Redsocial IN - Eventos</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/eventosstyle.css" rel="stylesheet">
<link rel="shortcut icon" href="img/rs.png">	
</head>
<body>
<div class="container">
	<nav>
		<ul class="menu_principal">
			<li class="active"><a class="principal" href="perfil.php">Perfil</a></li>
			<li class="active"><a class="principal" href="mensajes.php">Mensajes/Notificaciones</a></li>
			<li class="active"><a class="principal seleccionado" href="eventos.php">Eventos</a></li>
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
								<small>Eventos</small>			
							</h1>

					</div>
			</div>
			

			<nav>
				<ul class="menu_principal">
					<li>
						<h4>Crear Evento</h4>
					</li>
				</ul>
			</nav>
		
				<div class="cuadros">
					<form role="form" >	
						<div class="sesion_formulario">
								<label class="label2">Nombre</label>
								<input class="input" type="text">
						</div>
						<div class="sesion_formulario">		
								<label class="label2">Descripción</label>
								<input class="input" type="text">
					    </div>
					    <div class="sesion_formulario">		
								<label class="label2">Fecha: (yyyy/mm/dd hh:mm:ss)</label>
								<input class="input" type="text">
					    </div>
					    <div class="sesion_formulario">		
								<label class="label2">Lugar</label>
								<input class="input" type="text">
					    </div>
					    <div class="sesion_formulario">		
								<label class="label2">Invitados</label>
								<input class="input2" type="text">
					    </div>
						<div class="sesion_formulario">	
								<button type="submit"  class=" boton">Crear</button>
						</div>
				    </form>
				</div>			


			<nav>

					<ul class="menu_principal">
						<li>
							<h4>Consultar Eventos Creados</h4> 
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_eve_creado" href="#">Ver todos</a>
						</li>
					</ul>
			</nav>

			<div class="cuadros" id="eventos_creados">
					<h3>Eventos creados
					</h3>
					<br>

					<div class="sesion_formulario">
						<label class="label2">Id-evento:</label>
					</div>
					<div class="sesion_formulario">
						<label class="label2">Nombre</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Descripción</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Fecha: (yyyy/mm/dd hh:mm:ss)</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Lugar</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Invitados</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Lista de invitados</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Lista de Asistentes</label>
					</div>
					<div class="sesion_formulario">
							<button type="submit"  class="editar_evento boton">Editar</button>
							<button type="submit"  class="eliminar_evento boton">Eliminar</button>
					</div>
			</div>
		
			<div class="cuadros">
				<h3>Ultimo Evento creado
				</h3>
				<br>

					<div class="sesion_formulario">
						<label class="label2">Id-evento:</label>
					</div>
					<div class="sesion_formulario">
						<label class="label2">Nombre</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Descripción</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Fecha: (yyyy/mm/dd hh:mm:ss)</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Lugar</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Lista de invitados</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Lista de Asistentes</label>
					</div>
		   </div>




		   
		
				<nav>
					<ul class="menu_principal">
						<li>
							<h4>Invitación a Eventos</h4> 
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_invitacion" href="#">Ver todos</a>
						</li>
					</ul>
				</nav>

				<div class="cuadros" id="invitaciones">
					<h3>Invitaciones
					</h3>
						<div class="sesion_formulario">
						<label class="label2">Administrador:</label>
						</div>
						<div class="sesion_formulario">
							<label class="label2">Id-evento:</label>
						</div>
						<div class="sesion_formulario">
							<label class="label2">Nombre</label>
						</div>
						<div class="sesion_formulario">		
							<label class="label2">Descripción</label>
						</div>
						<div class="sesion_formulario">		
							<label class="label2">Fecha: (yyyy/mm/dd hh:mm:ss)</label>
						</div>
						<div class="sesion_formulario">		
							<label class="label2">Lugar:</label>
						</div>	
						<div class="sesion_formulario">		
							<label class="label2">Asistir:</label>
						</div>
						<div class="sesion_formulario">
								<button type="submit"  class="asistir_evento boton">Asistir</button>
								<button type="submit"  class="no_asistir_evento boton">No Asistir</button>
						</div>
				</div>


			
				<div class="cuadros">
					<h3>Ultima Invitación
					</h3>
					<br>
					<div class="sesion_formulario">
						<label class="label2">Administrador:</label>
					</div>
					<div class="sesion_formulario">
						<label class="label2">Id-evento:</label>
					</div>
					<div class="sesion_formulario">
						<label class="label2">Nombre</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Descripción</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Fecha: (yyyy/mm/dd hh:mm:ss)</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Lugar</label>
					</div>
				</div>
		</div>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="js/eventosscripts.js"></script>
</body>
</html>

			
