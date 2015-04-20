<?php //Creamos las variables de conexion
$server = "localhost";
$db_name = "Redsocialid";
$log = "postgres";
$pass = "91012206912ksg";
$port = "5432";
$cadena_con= "host=$server port=$port dbname=$db_name user=$log password=$pass";

//Conectamos con la cadena de conexion
$con = pg_connect($cadena_con) or die ('Ha fallado la conexion');
?>
<?php //Buscamos el usuario y contraseña
function verificauser($user, $password){
$sql_query = "Select login, correo, usuario.nombre, apellido, apellido2, 
					sexo,universidad.nombre, identificacion, tipoid, 
					carrera.nombre 
					From usuario inner join administrador on usuario.login = administrador.admin_id 
					inner join universidad on usuario.universidad = universidad.universidad_id 
					inner join carrera on usuario.carrera = carrera.carrera_id 
					Where login = '$user' and pass = '$password';";
$result = pg_query($sql_query);
return $result;
}?>
<?php //Miramos si es Admin
function esadmin($user){
$sql_queryadmin = "Select * From usuario inner join administrador 
					on administrador.admin_id = usuario.login 
					Where login = '$user';";	
$result = pg_query($sql_queryadmin);
return $result;}
?>
<?php //Recorremos tabla mostrnado campos especificos
function recorre_tabla($nombret,$campot){
$sql_query= "Select $campot From $nombret";
$consulta = pg_query($sql_query);
while($fila=pg_fetch_row($consulta)) 
 { echo "<option value='".$fila[0]."'>".$fila[0]."</option>"; } 
}
?>
<?php //Crea un select a partir de la opcion seleccionada en otro select
function recorre_tabla_anidada($nombreta, $nombretp, $selectDestino){
$sql_query= "Select * From $nombreta Where universidad = '$nombretp'";	
$consulta=pg_query($sql_query);
echo "<div><select name='$selectDestino' id='$selectDestino' onChange='cargaContenido(this.id)'>";
echo "<option value='0'>Seleccione $nombreta</option>";
while($fila=pg_fetch_row($consulta)){
	echo "<option value='".$fila[0]."'>".$fila[0]."</option>";}			
echo "</select></div>";	
}?>
<?php

function verificaBusquedaNombre($nombreU, $universidad){
	if($universidadU == "No conozco la universidad"){
		$sql_query = "Select nombre, login from Usuario where nombre LIKE '%$nombreU%';";
		$result= pg_query($sql_query);
	}else{
		$sql_query = "select nombre, login from usuario inner join (Select universidad_id from  universidad where nombre ='$universidadU') as A on usuario.universidad = A.id where nombre LIKE upper('%$nombreU%');";
		$result= pg_query($sql_query);
	}
	return $result;
}?>

<?php
function buscarContactoNombre($nombreU, $universidadU){
	
	if($universidadU == "No conozco la universidad"){
		$sql_query = "Select nombre, login from Usuario where nombre LIKE '%$nombreU%';";
		$consulta= pg_query($sql_query);
		while($fila=pg_fetch_row($consulta))
			{
				echo"<div class='sesion_formulario'>
						<form <form name='agregarUsuario' action='actualizatabla.php' method='post'>
							<input class='input' type='text' OnFocus='this.blur()' value='".$fila[0]."'>

							<input type='hidden' name='tabla' value='agregaUsuario'> 
							<?phP echo'<input type='hidden' name='user' value='$user'>';
								  echo'<input class='input' type='hidden'  name='usuario2' value='".$fila[1]."'>;	
							?>
							
							<button type='submit' class='boton'>Agregar</button>
						</form>
				</div>";
			}
	}else{
		$sql_query = "select nombre, login from usuario inner join (Select universidad_id from  universidad where nombre ='$universidadU') as A on usuario.universidad = A.id where nombre LIKE upper('%$nombreU%');";
		$consulta= pg_query($sql_query);
		while($fila=pg_fetch_row($consulta))
			{
				echo"<div class='sesion_formulario'>
						<form <form name='agregarUsuario' action='actualizatabla.php' method='post'>
							
							<input class='input' type='text' OnFocus='this.blur()' value='".$fila[0]."'>

							<input type='hidden' name='tabla' value='agregaUsuario'> 
							<?phP echo'<input type='hidden' name='user' value='$user'>';
								  echo'<input class='input' type='hidden'  name='usuario2' value='".$fila[1]."'>;	
							?>
							
							<button type='submit' class='boton'>Agregar</button>
						</form>
				</div>";
			}
	}
}?>

<?php

function consultarContactos($nombreC, $nombreU){

		$sql_query = "select nombre from usuario inner join 
					((select usuario_dos from contacto inner join (select login from usuario where nombre like upper('%$nombreC%')) as A on A.login = contacto.usuario_dos where contacto.usuario_uno='$nombreU')
					union
					(select usuario_uno from contacto inner join (select login from usuario where nombre like upper('%$nombreC%')) as A on A.login = contacto.usuario_uno where contacto.usuario_dos='$nombreU')) as R on usuario.login = R.usuario_dos;"
		
		$consulta=pg_query($sql_query):

		if (pg_num_rows($consulta) >= 1){
			while($fila=pg_fetch_row($consulta)){
					echo"<div class='sesion_formulario'>
								<input class='input' type='text' OnFocus='this.blur()' name='usuario2' value='".$fila[0]."'>
						</div>";
			}
		}else{
			echo"<div class='sesion_formulario'>
						<h3>No hay resultados</h3>
				</div>";
		}
}?>

<?php

function listarContactos($nombreU){

		$sql_query = "select U.nombre, Uni.nombre  from Universidad Uni inner join (select nombre, universidad from usuario inner join 
						((select usuario_dos from contacto inner join (select login from usuario) as A on A.login = contacto.usuario_dos where contacto.usuario_uno='$nombreU')
						union
						(select usuario_uno from contacto inner join (select login from usuario) as A on A.login = contacto.usuario_uno where contacto.usuario_dos='$nombreU')) as R on usuario.login = R.usuario_dos) As U on U.universidad = Uni.universidad_id;"
		
		$consulta=pg_query($sql_query):
		while($fila=pg_fetch_row($consulta)){
				echo"<div class='sesion_formulario'>
								<label class='label2'>Usuario</label>
								<input class='input' type='text' OnFocus='this.blur()' name='usuario2' value='".$fila[0]."'>
						</div>		
						<div class='sesion_formulario'>
								<label class='label2'>Universidad</label>
								<input class='input' type='text' OnFocus='this.blur()' name='usuario2' value='".$fila[1]."'>
						</div>	
						<div class='sesion_formulario'>
								<button type='submit'  class='boton'>Eliminar</button>
						</div>";
		}
}?>

<?php
function cincoMejoresEventos(){
$sql_query = "select nombre, count(*) total_participantes from 
				evento inner join Invitacion_evento as ie on evento.id_evento = ie.id_evento and ie.asistir = true 
				group by nombre 
				order by total_participantes  desc;";
$consulta = pg_query($sql_query);
$counter = 0;
while($fila=pg_fetch_row($consulta) and $counter <5){
	$counter = $counter +1;
	echo "<div class='sesion_formulario'>
		<label class='label'>Evento:</label>
		<input class='input' type='text' OnFocus='this.blur()' value = '$fila[0]'>
	    <label class='label'>Total:</label>
		<input class='input2' type='text' OnFocus='this.blur()'  value = '$fila[1]'>
	</div>";
}
}?>
<?php
function listarUsuariosPorCarreras(){
$sql_query = "select  carrera.nombre, count(*) from usuario inner join carrera on usuario.carrera = carrera.carrera_id group by carrera.nombre;";
$consulta = pg_query($sql_query);
while($fila=pg_fetch_row($consulta)){
	echo "<div class='sesion_formulario'>
		<label class='label'>Carrera:</label>
		<input class='input' type='text' OnFocus='this.blur()' value = '$fila[0]'>
	    <label class='label'>Total:</label>
		<input class='input2' type='text' OnFocus='this.blur()'  value = '$fila[1]'>
	    </div>";
}
}?>
<?php
function listarUsuariosPorUniversidad(){
$sql_query = "select  universidad.nombre, count(*) from usuario inner join universidad on usuario.universidad = universidad.universidad_id group by universidad.nombre;";
$consulta = pg_query($sql_query);
while($fila=pg_fetch_row($consulta)){
	echo "<div class='sesion_formulario'>
		<label class='label'>Universidad:</label>
		<input class='input' type='text' OnFocus='this.blur()' value = '$fila[0]'>
	    <label class='label'>Total:</label>
		<input class='input2' type='text' OnFocus='this.blur()'  value = '$fila[1]'>
	    </div>";
}
}?>
