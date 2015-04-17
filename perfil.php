<?php 
include "conexion.php";
$user = $_POST["user"];  
$password = $_POST["password"];
$arregloresultante= verificauser($user, $password);
if (pg_num_rows($arregloresultante) == 1){
	$arregloadmin=esadmin($user);
	if (pg_num_rows($arregloadmin) == 1){header("Location:admini.php?user=$user&pass=$password");}
	$fila=pg_fetch_row($arregloresultante);
	$_SESSION['usuario'] = $user;
	$login=$fila[0];
	$correo=$fila[1];
	$nombre=$fila[2];
	$apellido1=$fila[3];
	$apellido2=$fila[4];
	$sexo=$fila[5];
	$universidad=$fila[6];
	$id=$fila[7];
	$tipoid=$fila[8];
	$carrera=$fila[9];
}else{header("Location: index.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Redsocial IN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="css/perfilstyle.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/rs.png">
</head>
<body>
<div class="container">
	<nav>
		<ul class="menu_principal">
			<li class="active"><a class="principal seleccionado" href="perfil.php">Perfil</a></li>
			<li class="active"><a class="principal" href="mensajes.php">Mensajes/Notificaciones</a></li>
			<li class="active"><a class="principal" href="eventos.php">Eventos</a></li>
			<li class="active"><a class="principal" href="grupos.php">Grupos</a></li>
			<li class="derecha active"><a class="principal" href="logout.php">Salir</a></li>
			<li class="derecha active"><a class="principal eliminar_p" href="#">Eliminar Perfil</a></li>
			<li class="derecha active"><a class="principal cambia_cont" href="#">Cambiar contraseña</a></li>
		</ul>
	</nav>
	<div class="contenido">
		<div class="cuadros elimina_perfil">
					<h5>¿Esta seguro que desea Eliminar el perfil?</h5>
					<form name="elimanaPer" action="actualizatabla.php" method="post">
						<input type='hidden' name='tabla' value='eliminaPerfil'> 
						<?phP echo"<input type='hidden' name='user' value='$user'"
						?>
					<button type="submit"  class="eliminar_perfil boton">Aceptar</button>
					</form>
		</div>
		<div class="contenido">
		<div class="cuadros cambia_contrasena">
				<h5>Cambiar contraseña</h5>
				<form name="cambiaContra" action="actualizatabla.php" method="post">
					<div class="sesion_formulario">
						<label class="label3">Contraseña nueva:</label>
						<input class="input" type="text" id="contraseña1" name="contraseña1">
					</div>
					<div class="sesion_formulario">
						<label class="label3">Confirmación:</label>
						<input class="input" type="text" id="contraseña2" name="contraseña2">
					</div>			
						<input type="hidden" name="tabla" value="cambiaContrasena">
						<?php echo"<input type='hidden' name='user' value='$user'>";?>
							<button type="submit"  class="cambiar_contraseña boton">Aceptar</button>
				</form>
		</div>
		<div class="columna1">
			<div class="cuadros">
					<div class=logo><img class="img-circulo" alt="140x140" src="img/foto.png"></div>
					<div class="nombre"><h1><?php echo "$nombre $apellido1 <br><small>$universidad</small>" ?></h1></div>
			</div>
			<nav class="personal">
				<ul class="menu_principal">
					<li><h4>Datos Personales</h4></li>
					<li class="derecha active"><a class="principal" id="ver_editar_personal" href="#">Editar</a></li>
				</ul>
			</nav>
			<div class="cuadros personal">
				<p class="datos">Tipo documento: <?php echo " $tipoid"?></p>
				<p class="datos">Número documento: <?php echo "$id"?></p>
				<p class="datos">Genero: <?php echo " $sexo"?></p>
				<p class="datos">E-mail: <?php echo " $correo"?></p>
			</div>
			<div class="cuadros" id="editar_personal">
				<h3 class="text-success text-center">Editar información básica</h3>
				<form name="actualizarinfo" action="actualizatabla.php" method="post" >
					<div class="sesion_formulario">
						<label class="label2">Nombre(s)</label>
						<input class="input" type="text" id="nom" name="nom">
					</div>
					<div class="sesion_formulario">
						<label class="label2">Apellido 1</label>
						<input class="input" type="text" id="apellido" name="apellido">
					</div>
					<div class="sesion_formulario">
						<label class="label2">Apellido 2</label>
						<input class="input" type="text" id="apellido2" name="apellido2">
					</div>
					<div class="sesion_formulario">
						<label class="label2">Universidad</label>
						<select class="select" id="universidad" name="universidad">
								<option value='0'> Seleccione Universidad...</option>
								<?php recorre_tabla("universidad", "nombre");?>
						</select>
					</div>	
					<div class="sesion_formulario">
						<label class="label2">Tipo documento</label>
						<select class="select" id="tipodoc" name="tipodoc">
							<option>TI</option>
							<option>CC</option>
							<option>CE</option>
						</select>
					</div>					
					<div class="sesion_formulario">
						<label class="label2">Numero documento</label>
						<input class="input" type="text" id="doc" name="doc">
					</div>	
					<div class="sesion_formulario">
						<label class="label2">Genero</label>
						<select class="select" name="sex" id="sex">
							<option>Masculino</option>
							<option>Femenino</option>
						</select>
					</div>
					<div class="sesion_formulario">
						<label class="label2">E-mail</label>
						<input class="input" type="text" id="mail" name="mail">
					</div>
					<div class="sesion_formulario">
						<input type="hidden" name="tabla" value="datospersonales">
						<?php echo"<input type='hidden' name='user' value='$user'>";?>
						<button type="submit"  class="guardar_personal boton">Guardar</button>
						<button type="submit"  class="cancelar_personal boton">Cancelar</button>
					</div>
				</form>
			</div>
			<nav class="profesional">
				<ul class="menu_principal">
					<li><h4>Datos Profesionales</h4></li>
					<li class="derecha active">
						<a class="principal" id="ver_profesionales" href="#">Ver todos</a>
					</li>
					<li class="derecha active">
						<a class="principal" id="ver_agregar_profesional" href="#">Agregar</a>
					</li>
				</ul>
			</nav>
			<div class="cuadros" id="profesionales">
				<h3 class="text-success text-center">Información profesional</h3>
				<div class="sesion_formulario">
				<label class="label2">Carrera</label>
					<select class="select"></select>
			</div>	
				<div class="sesion_formulario">
				<button type="submit"  class="editar_carrera boton">Editar</button>
				<button type="submit"  class="eliminar_carrera boton">Eliminar</button>
			</div>	
				<div class="sesion_formulario">
				<label class="label2">Estudio</label>
			</div>	
				<div class="sesion_formulario">
				<button type="submit"  class="eliminar_estudio boton">Eliminar</button>
			</div>
			</div>
			<div class="cuadros" id="agregar_profesionales">
				<h3 class="text-success text-center">Agregar información profesional</h3>
				<div class="sesion_formulario">
					<label class="label2">Estudio</label>
					<input class="input" type="text">
				</div>	
				<div class="sesion_formulario">
					<button type="submit"  class="agregar_estudio boton">Agregar</button>
					<button type="submit"  class="cancelar_estudio boton">Cancelar</button>
				</div>	
			</div>
			<div class="cuadros profesional">
				<p class="datos">Carrera: <?php echo " $carrera"?></p>
				<p class="datos">Ultimos estudios</p>
				<h5 class="importante"> Se muestran los tres ultimo estudios ingresados.</h5>
				<p class="datos">Estudio 1:</p><br>
				<p class="datos">Estudio 2:</p><br>
				<p class="datos">Estudio 3:</p><br>
			</div>
		</div>
		<div class="columna2">
			<div class=titulos>
				<img class="buscar" alt="1x18" src="img/contactos.png">
			</div>
			<nav>
				<ul class= "menu_principal"><!--la etiqueta ul por defecto tiene margenes -->
					<li class="active" id="publicar_nav"><a href="#" class="principal" id="mostrar-agr">Agregar</a></li>
					<li class="active"><a class="principal" id="mostrar-con" href="#">Consultar</a></li> <!--a es la etieuta href es el atributo que tiene la url (# significa que redirecciona a la misma página)-->
					<li class="active"><a class="principal" href="#">Listar</a></li>
					<li class="active"><a class="principal"  id="mostrar-eli" href="#">Eliminar</a></li> <!--Los elementos li son cajas y funcionan con block -->				
				</ul>
			</nav>			
			<form class="agregar" role="form" >
				<div class="cuadros "><h3>Agregar Contacto.</h3></div>
				<div class="sesion_formulario">
					<label class="label2">Nombre:</label>
					<input class="input" type="text" id="bNombre" name="bNombre">
				</div>
				<div class="sesion_formulario">
					<label class="label2">Universidad:</label>
					<input class="input" type="text" id="bUniversidad" name="bUniversidad">
				</div>
				<div class="sesion_formulario">
					<button type="submit" class="boton">Buscar</button>
				</div>	
				 <?php buscarContactoNombre("bNombre","bUniversidad")?>
			</form>						
			<form class="consultar" role="form">
				<div class="cuadros"><h3>Consultar Contacto.</h3></div>
				<div class="sesion_formulario">
			 		<label class="label2">Nombre:</label>
					<input class="input" id="inputAmigo" type="text">
				</div>
				<div class="sesion_formulario">							
					 <button type="submit" class="boton">Consultar</button>
				</div>
			</form>
			<div class="cuadros"><h3>Solicitudes de amistad.</h3>
				<ul class="lista">
					<li class="solicitud">
						<a class="principal" href="#">Ver solicitudes</a>
					</li>
				</ul>
			</div>					
			<form name="eliminaCon" class="eliminar" role="form">
				<div class="cuadros"><h3>Eliminar Contacto.</h3></div>
				<div class="sesion_formulario">
					<label class="label2" >Nombre:</label>
					<input class="input" id="contactoAEliminar" type="text" name="contactoAEliminar">
				</div>
				<div class="sesion_formulario">
					<input type="hidden" name="tabla" value="eliminaContacto">
					<?php echo"<input type='hidden' name='user' value='$user'>";?>
					<button type="submit" class="boton">Eliminar</button>
				</div>
			</form>
			<div class="div_agenda">
				<img class="agenda_titulo" alt="1x18" src="img/agenda.png">
				<h4> Actividades Proximas </h4><br>
				<p class="datos">Actividad 1:</p><br>
				<p class="datos">Actividad 2:</p><br>
				<p class="datos">Actividad 3:</p><br>
				<p class="datos">Actividad 4:</p><br><br>
				<nav class="barra_actividad">
					<ul class="menu_principal">
						<li class="derecha active">
							<a class="principal" id="ver_consultar_actividad" href="#">Consultar</a>
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_agregar_actividad" href="#">Agregar</a>
						</li>
					</ul>
				</nav>
				<form id="agregar_actividad">	
					<div class="cuadros"><h3>Agregar Actividad</h3>
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
							<button type="submit" class="boton">Agregar</button>
							<button type="submit" class="boton" id="cancelar_agregar">Cancelar</button>
						</div>
					</div>
				</form>
				<form id="consultar_actividad">	
					<div class="cuadros"><h3>Consultar Actividad</h3>
						<div class="sesion_formulario">
							<label class="label2">fecha:</label>
							<input class="input" id="inputAmigo" type="text">
						</div>
						<h5>(yyyy/mm/dd hh:mm:ss)</h5>
						<div class="sesion_formulario">
							<button type="submit" class="boton">Consultar</button>
							<button type="submit" class="boton" id="cancelar_consultar">Cancelar</button>
						</div>
						<h3>----------------------------------------------</h3>
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
				</form>	
			</div>
		</div>
	</div>
</div>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/perfilscripts.js"></script>
</body>
</html>

			
