<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "conexion.php"; ?>
	<script type="text/javascript" src="js/Modificador_form.js"></script>
	<meta charset="utf-8">
	<title>RedSocial IN - Bienvenido!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/rs.png">
</head>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
				<div class="item active">
					<img alt="" src="img/login.png">
					<div class="carousel-caption">				
						<p>Red Social hecha por y para estudiantes de las diferentes universidades del pais.</p>
					</div>
				</div>
		</div>
	</div>
	<div class="row1 clearfix">
		<div class="col-md-6 column">
			<div class="log">
				<form class="form-horizontal" role="form" action="perfil.php" method="post">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
						<div class="col-sm-10">
							<input class="form-control" id="user" type="text" name="user">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Clave</label>
						<div class="col-sm-10">
							<input class="form-control" id="password" name="password" type="password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Entrar</button>
							<a class="principal" id="mostrar-registro" href="#">Registrarme</a>
						</div>
					</div>
				</form>
			</div>
			<div class="registro">
				<form class="form-horizontal" role ="form" action="actualizatabla.php" method="post">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
						<div class="col-sm-10"><input class="form-control" id="nuser" type="text" name="nuser"></div>	
					</div>	
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Universidad</label>
						<div class="col-sm-10">
							<select id="universidad" name="universidad" onchange="cargaContenido(this.id)">
								<option value='0'> Seleccione Universidad...</option>
								<?php recorre_tabla("universidad", "nombre");?>
							</select>
						</div>	
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Carrera</label>
						<div class="col-sm-10">
							<select id="carrera" name="carrera" disabled = "disabled">
							<option value='0'> Seleccione Universidad...</option>
							</select>
						</div>	
					</div>	
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10"><input class="form-control" id="mail" type="text" name="mail"></div>	
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Clave</label>
						<div class="col-sm-10">
							<input class="form-control" id="npassword" type="password" name="npassword" >							
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Confirmar Clave</label>
						<div class="col-sm-10">
							<input class="form-control" id="npassword2" type="password" name="npassword2">
						</div>
						<input type="hidden" name="tabla" value="nuevousuario">
						<button type="submit"  class="finalizar btn btn-default">Cancelar</button>
						<button type="submit"  class="cancelar btn btn-default">Finalizar</button>
					</div>
				</form>	
			</div>		
		</div>
	</div>
</div>
</body>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
</html>

