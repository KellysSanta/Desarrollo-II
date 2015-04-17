<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Redsocial IN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	

	<link href="css/adminstyle.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="img/rs.png">
  
	
</head>
<body>
<?php
	include "conexion.php";
	$user = $_GET["user"];  
	$password = $_GET["pass"];
	$arregloresultante= verificauser($user, $password);
    $fila=pg_fetch_row($arregloresultante);
	$_SESSION['usuario'] = $user;
	$login=$fila[0];
	$correo=$fila[1];
	$nombre=$fila[3];
	$apellido1=$fila[4];
	$apellido2=$fila[5];
	$sexo=$fila[6];
	$universidad=$fila[7];
	$id=$fila[8];
	$tipoid=$fila[9];
	$carrera=$fila[10];?>

<div class="container">

	<nav>

			<ul class="menu_principal">
				<li class="active">
					<a class="principal seleccionado" href="admini.php">Perfil</a>
				</li>
				<li class="derecha active">
					<a class="principal" href="logout.php">Salir</a>
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
								<?php echo " $nombre $apellido1"?> 
								<small>Administrador</small>
							</h1>

					</div>
			</div>


			<nav class="personal">

					<ul class="menu_principal">
						<li>
							<h4>Datos Personales</h4>
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_editar_personal" href="#">Editar</a>
						</li>
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
			<nav class="universidad">

					<ul class="menu_principal">
						<li>
							<h4>Gestión Universidades</h4> 
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_universidades" href="#">Ver todas</a>
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_agregar_universidades" href="#">Agregar</a>
						</li>
					</ul>

			</nav>

			<div class="cuadros" id="universidades">
				<h3 class="text-success text-center">Universidades
				</h3>
					<div class="sesion_formulario">
							<label class="label2">Universidad</label>
							<input class="input" type="text">
						
					</div>	
					<div class="sesion_formulario">
							<button type="submit"  class="editar_carrera boton">Editar</button>
							<button type="submit"  class="eliminar_carrera boton">Eliminar</button>
					</div>	
			</div>

			<div class="cuadros" id="agregar_universidades">
				<h3 class="text-success text-center">Agregar Universidad</h3>
				<form action="actualizatabla.php" method="post">
					<div class="sesion_formulario">
							<label class="label2">Universidad</label>
							<input class="input" type="text" name="uni" id="uni">
					</div>
					<div class="sesion_formulario">
							<label class="label2">Ciudad</label>
							<input class="input" type="text" name="ciudad" id="ciudad">
					</div>					
					<div class="sesion_formulario">
							<input type="hidden" name="tabla" value="nuevauni">
							<button type="submit"  class="agregar_estudio boton">Agregar</button>
							<button type="submit"  class="cancelar_universidad boton">Cancelar</button>
					</div>
				</form>
			</div>
			
			<br>
			
			<nav class="profesional">

					<ul class="menu_principal">
						<li>
							<h4>Gestión Carreras</h4> 
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_profesionales" href="#">Ver todas</a>
						</li>
						<li class="derecha active">
							<a class="principal" id="ver_agregar_profesional" href="#">Agregar</a>
						</li>
					</ul>

			</nav>

			<div class="cuadros" id="profesionales">
				<h3 class="text-success text-center">Carreras
				</h3>
					<div class="sesion_formulario">
							<label class="label2">Carrera</label>
							<input class="input" type="text">
							</select>
					</div>	
					<div class="sesion_formulario">
							<button type="submit"  class="editar_carrera boton">Editar</button>
							<button type="submit"  class="eliminar_carrera boton">Eliminar</button>
					</div>	
			</div>

			<div class="cuadros" id="agregar_profesionales">
				<h3 class="text-success text-center">Agregar Carrera
				</h3>
					<div class="sesion_formulario">
							<label class="label2">Carrera</label>
							<input class="input" type="text">
					</div>	
					<div class="sesion_formulario">
							<button type="submit"  class="agregar_estudio boton">Agregar</button>
							<button type="submit"  class="cancelar_estudio boton">Cancelar</button>
					</div>	
			</div>
			
		</div>
		
		
		

		
		<div class="columna2">
					<br>
					<nav>
								<ul class= "menu_principal">
									<li>
										<h4>Reportes</h4> 
									</li>
									<li class="derecha active" id="publicar_nav" >
										<a href="#" class="principal" id="mostrar-agr">Universidad</a>

									</li>
									<li class="derecha active"><a class="principal" id="mostrar-con" href="#">Carrera</a></li> <!--a es la etieuta href es el atributo que tiene la url (# significa que redirecciona a la misma página)-->
									<li class="derecha active"><a class="principal" href="#">Evento</a></li>	
								</ul>
							</nav>


						
						<form class="agregar" role="form" >
								<div class="cuadros " >
									<h3>
										Usuarios por universidad
									</h3>
								</div>
								<div class="sesion_formulario">
						 			<label class="label2">Universidad:</label>
									<input class="input" type="text">
									<label class="label">Total:</label>
									<input class="input2" type="text">
								</div>							
						</form>
					
				
					
						<form class="consultar" role="form">
							<div class="cuadros " >
									<h3>
										Usuarios por Carrera
									</h3>
								</div>
								<div class="sesion_formulario">
						 			<label class="label2">Carrera:</label>
									<input class="input" type="text">
									<label class="label">Total:</label>
									<input class="input2" type="text">
								</div>	
						</form>
					
						<form role="form">
							<div class="cuadros " >
									<h3>
										Eventos destacados
									</h3>
								</div>
								<div class="sesion_formulario">
						 			<label class="label">Evento:</label>
									<input class="input" type="text">
									<label class="label">Total:</label>
									<input class="input2" type="text">
								</div>	
						</form>		
				</div>	
			</div>	
</div>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="js/adminscripts.js"></script>
</body>
</html>

			
