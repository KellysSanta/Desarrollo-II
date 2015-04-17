<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Redsocial IN - Grupos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

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
					<a class="principal" href="#">Mensajes/Notificaciones</a>
				</li>
				<li class="active">
					<a class="principal" href="#">Eventos</a>
				</li>
				<li class="active">
					<a class="principal seleccionado" href="#">Grupos</a>
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
								Grupos			
							</h1>

					</div>
			</div>
			

			<nav>
				<ul class="menu_principal">
					<li>
						<h4>Crear Grupo</h4>
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
							<h4>Consultar Grupos Creados</h4> 
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_gru_creado" href="#">Ver todos</a>
						</li>
					</ul>
			</nav>

			<div class="cuadros" id="grupos_creados">
					<h3>Grupos Creados
					</h3>
					<br>
					<div class="sesion_formulario">
						<label class="label2">Nombre</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Descripción</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Lista de usuarios</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Mensaje</label>
						<textarea class="cuerpo_mensaje" NAME="Texto"> 
						</textarea>	
					</div>
					<div class="sesion_formulario">
							<button type="submit"  class="enviar_mensaje boton">Enviar mensaje</button>
							<button type="submit"  class="editar_grupo boton">Editar</button>
							<button type="submit"  class="eliminar_grupo boton">Eliminar</button>
					</div>
			</div>
		
			<div class="cuadros">
				<h3>Ultimo Grupo creado
				</h3>
				<br>

					<div class="sesion_formulario">
						<label class="label2">Nombre</label>
					</div>
					<div class="sesion_formulario">		
						<label class="label2">Descripción</label>
				    </div>
				    <div class="sesion_formulario">		
						<label class="label2">Invitados</label>
				    </div>
		   </div>

				<nav>
					<ul class="menu_principal">
						<li>
							<h4>Invitación a Grupos</h4> 
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_invitacion" href="#">Ver todas</a>
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
						<label class="label2">Nombre</label>
						</div>
						<div class="sesion_formulario">		
							<label class="label2">Descripción</label>
						</div>
						<div class="sesion_formulario">		
							<label class="label2">Lista de usuarios</label>
						</div>
						<div class="sesion_formulario">
							<button type="submit"  class="aceptar_grupo boton">Aceptar</button>
							<button type="submit"  class="eliminar_grupo boton">Eliminar</button>
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
						<label class="label2">Nombre</label>
					</div>
					<div class="sesion_formulario">		
							<label class="label2">Descripción</label>
					</div>
					<div class="sesion_formulario">		
							<label class="label2">Lista de usuarios</label>
					</div>
				</div>


				<nav>
					<ul class="menu_principal">
						<li>
							<h4>Grupos a los que pertenezco</h4> 
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_grupos" href="#">Ver todos</a>
						</li>
					</ul>
				</nav>

				<div class="cuadros" id="grupos">
					<h3>Grupos
					</h3>
						<div class="sesion_formulario">
						<label class="label2">Administrador:</label>
						</div>
						<div class="sesion_formulario">
						<label class="label2">Nombre</label>
						</div>
						<div class="sesion_formulario">		
							<label class="label2">Descripción</label>
						</div>
						<div class="sesion_formulario">		
							<label class="label2">Lista de usuarios</label>
						</div>
						<div class="sesion_formulario">		
							<label class="label2">Mensaje</label>
							<textarea class="cuerpo_mensaje" NAME="Texto"> 
							</textarea>	
						</div>
						<div class="sesion_formulario">
							<button type="submit"  class="enviar_mensaje boton">Enviar Mensaje</button>
							<button type="submit"  class="eliminar_grupo boton">Eliminar</button>
						</div>
				</div>
		</div>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>

			
