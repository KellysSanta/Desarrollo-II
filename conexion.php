<?php //Creamos las variables de conexion
$server = "localhost";
$db_name = "Redsocialin";
$log = "postgres";
$pass = "jhon07";
$port = "5432";
$cadena_con= "host=$server port=$port dbname=$db_name user=$log password=$pass";

//Conectamos con la cadena de conexion
$con = pg_connect($cadena_con) or die ('Ha fallado la conexion');
?>




<?php /**********************************************************Administrador**************************************************/ ?>

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


<?php /******************************************************************Agenda***********************************************/ ?>

<?php
function consultaActividad($user, $fecha){
	$sql_query = "select * from Usuario_Agenda where usuario='$user' and fecha='$fecha';";

	$consulta=pg_query($sql_query);
	if (pg_num_rows($consulta) >= 1){
		while($fila=pg_fetch_row($consulta)){
			echo	"<div class='cuadros'>
						<form name='gestionActividad' action='actualizatabla.php' method='post'>
							<div class='sesion_formulario'>
								<label class='label2'>Nombre:</label>
								<input class='input'  type='text' name ='nombreAct' value='$fila[2]' OnFocus='this.blur()'>
							</div>
							<div class='sesion_formulario'>
								<label class='label2'>Fecha:</label>
								<input class='input'  type='text' name='fechaAct' value = '$fila[3]' OnFocus='this.blur()'>
							</div>
							<div class='sesion_formulario'>
								<label class='label'>Lugar:</label>
								<input class='input' type='text' name='lugarcAct' value = '$fila[4]' OnFocus='this.blur()'>
							</div>
							<div class='sesion_formulario'>
								<label class='label2'>Descripción:</label>
								<input class='input' type='text' name='descAct' value = '$fila[5]' OnFocus='this.blur()'>
							</div>
							<div class='sesion_formulario'>
								<input type='hidden' name='tabla' value='eliminaActividad'>
								<input type='hidden' name='user' value='$user'>
								<button type='submit' class'boton'>Editar</button>
								<button type='submit' class='boton'>Eliminar</button>
							</div>
						</form>	
				</div>";
		}
	}else {

		echo"<div class='sesion_formulario'>
						<h3>No hay actividades programadas para la fecha seleccionada.$fecha</h3>
				</div>";

	}	
} 
?>



<?php /***********************************************************************Contactos****************************************************************************/ ?>

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
function buscarContactoNombre($nombreU, $universidadU, $log){	
	if($universidadU ==0){
		$sql_query = "Select nombre, login from Usuario where nombre LIKE '%$nombreU%';";
		$consulta= pg_query($sql_query);
		while($fila=pg_fetch_row($consulta))
			{
				echo"<div class='sesion_formulario'>
						<form name='agregarUsuario' action='actualizatabla.php' method='post'>
							<label>Nombre : $fila[0]</label>
							<br><label>Login : $fila[1]</label>
							<input type='hidden' name='tabla' value='agregaUsuario'>
							<input type='hidden' name='loginyo' value='$log'>
							<input type='hidden' name='login' value='$fila[1]'>
							<button type='submit' class='boton'>Agregar</button>
						</form>
				</div>";
			}
	}else{
		$sql_query = "select U.nombre, U.login from usuario as U inner join (Select universidad_id from  universidad where nombre ='Universidad Santiago de Cali') as A on U.universidad = A.universidad_id where U.nombre LIKE upper('%$ASA%');";
		$consulta= pg_query($sql_query);
		while($fila=pg_fetch_row($consulta))
			{
				echo"<div class='sesion_formulario'>
						<form name='agregarUsuario' action='actualizatabla.php' method='post'>
							<label>Nombre : $fila[0]</label>
							<br><label>Login : $fila[1]</label>
							<input type='hidden' name='tabla' value='agregaUsuario'>
							<input type='hidden' name='login' value='$fila[1]'>
							<button type='submit' class='boton'>Agregar</button>
						</form>
				</div>";
			}
	}
}?>

<?php
function buscarContactoEliminar($nombreU, $log){	
		$sql_query = "Select nombre, login from Usuario where nombre LIKE '%$nombreU%' and login IN (select usuario_dos from contacto where usuario_uno='$log');";
		$consulta= pg_query($sql_query);
		while($fila=pg_fetch_row($consulta))
			{
				echo"<div class='sesion_formulario'>
						<form name='eliminarContacto' action='actualizatabla.php' method='post'>
							<label>Nombre : $fila[0]</label>
							<br><label>Login : $fila[1]</label>
							<input type='hidden' name='tabla' value='eliminarContacto'>
							<input type='hidden' name='login' value='$log'>
							<input type='hidden' name='contacto' value='$fila[1]'>
							<button type='submit' class='boton'>Eliminar</button>
						</form>
				</div>";
			}
}?>

<?php
function consultarContactos($nombreC, $nombreU){

		$sql_query = "select nombre from usuario inner join 
					((select usuario_dos from contacto inner join (select login from usuario where nombre like upper('%$nombreC%')) as A on A.login = contacto.usuario_dos where contacto.usuario_uno='$nombreU')
					union
					(select usuario_uno from contacto inner join (select login from usuario where nombre like upper('%$nombreC%')) as A on A.login = contacto.usuario_uno where contacto.usuario_dos='$nombreU')) as R on usuario.login = R.usuario_dos;";
		
		$consulta=pg_query($sql_query);

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
						(select usuario_uno from contacto inner join (select login from usuario) as A on A.login = contacto.usuario_uno where contacto.usuario_dos='$nombreU')) as R on usuario.login = R.usuario_dos) As U on U.universidad = Uni.universidad_id;";
		
		$consulta=pg_query($sql_query);
		while($fila=pg_fetch_row($consulta)){
				echo"<div class='sesion_formulario'>
								<label class='label2'>Usuario</label>
								<input  type='text' OnFocus='this.blur()' name='usuario2' value='".$fila[0]."'>
						</div>		
						<div class='sesion_formulario'>
								<label class='label2'>Universidad</label>
								<input  type='text' OnFocus='this.blur()' name='usuario2' value='".$fila[1]."'>
						</div>	
						<div class='sesion_formulario'>
								<button type='submit'  class='boton'>Eliminar</button>
						</div>";
		}
}?>

<?php /***********************************************************************Eventos*********************************************************************/ ?>

<?php 
function notificacionEventos($usuario){
$sql_query = "SELECT * from Notificacion_Evento where usuario='$usuario' and oculto='false' and posponer='false' and estado='true';";
$consulta = pg_query($sql_query);


		while($fila=pg_fetch_row($consulta)){

			$sql_query1 = "SELECT nombre from Evento where id_evento = '".$fila[0]."';";
			$consulta1 = pg_query($sql_query1);
			$fila2=pg_fetch_row($consulta);
				echo"

						<form name='gestionNotEventos' action='actualizatabla.php' method='post'>
								<div class='sesion_formulario'>
										<label class='label2'>Nombre</label>
										<input type='hidden' name='idEvento' value='".$fila[0]."'>
										<input  type='text' OnFocus='this.blur()' name='nombreEvento' value='".$fila2[0]."'>
								</div>		
								<div class='sesion_formulario'>
										<label class='label2'>Notificacion</label>
										<input  type='text' OnFocus='this.blur()' name='notificacionE' value='".$fila[3]."'>
								</div>	
								
								<div class='sesion_formulario'>
										<input type='hidden' id='tablae' name='tabla' value='ocultarNotEvento'> 
										<input type='hidden' name='user' value='$usuario'>
										<input type='hidden' name='oculto' value=".$fila[4].">
										<input type='hidden' name='posponer' value=".$fila[5].">
										<button type='submit'  class='boton'>Ocultar</button>
										<script>function posponerEvento(){x=document.getElementById('tablae');
													x.value = 'posponerNotEvento';}</script>
										<button type='submit'  class='boton' onclick='posponerEvento'>Posponer</button>
										<script>function eliminarEvento(){x=document.getElementById('tablae');
													x.value = 'eliminarNotEvento';}</script>
										<button type='submit'  class='boton' onclick='eliminarEvento'>Eliminar</button>
								</div>

						</form>
						<h3>--------------------------------------------------------------------------</h3>";
				}
			
}
?>

<?php 
function notificacionEventosOcultos($usuario){

$sql_query = "SELECT * from Notificacion_Evento where usuario='$usuario' and oculto='true' and posponer='false' and estado='true'; ";
$consulta = pg_query($sql_query);


		while($fila=pg_fetch_row($consulta)){

			$sql_query1 = "SELECT nombre from Evento where id_evento = '".$fila[0]."';";
			$consulta1 = pg_query($sql_query1);
			$fila2=pg_fetch_row($consulta);
				echo"

						<form name='gestionNotEventosO' action='actualizatabla.php' method='post'>
								<div class='sesion_formulario'>
										<label class='label2'>Nombre</label>
										<input type='hidden' name='idEvento' value='".$fila[0]."'>
										<input  type='text' OnFocus='this.blur()' name='nombreEvento' value='".$fila2[0]."'>
								</div>		
								<div class='sesion_formulario'>
										<label class='label2'>Notificacion</label>
										<input  type='text' OnFocus='this.blur()' name='notificacionE' value='".$fila[3]."'>
								</div>	
								
								<div class='sesion_formulario'>
										<input type='hidden' name='tablaO' value='dejarOcultarNotEvento'> 						
										<input type='hidden' name='user' value='$usuario'>
										<input type='hidden' name='oculto' value=".$fila[4].">
										<input type='hidden' name='posponer' value=".$fila[5].">
										<button type='submit'  class='boton'>Dejar de Ocultar</button>
										<script>function eliminarEventoO(){x=document.getElementById('tablaO');
													x.value = 'eliminarNotEvento';}</script>
										<button type='submit'  class='boton' onclick='eliminarEventoO'>Eliminar</button>
								</div>

						</form>
						<h3>--------------------------------------------------------------------------</h3>";
				}
			
}
?>


<?php 
function notificacionEventosPospuestos($usuario){

$sql_query = "SELECT * from Notificacion_Evento where usuario='$usuario' and oculto='false' and posponer='true' and estado='true'; ";
$consulta = pg_query($sql_query);


		while($fila=pg_fetch_row($consulta)){

			$sql_query1 = "SELECT nombre from Evento where id_evento = '".$fila[0]."';";
			$consulta1 = pg_query($sql_query1);
			$fila2=pg_fetch_row($consulta);
				echo"

						<form name='gestionNotEventosp' action='actualizatabla.php' method='post'>
								<div class='sesion_formulario'>
										<label class='label2'>Nombre</label>
										<input type='hidden' name='idEvento' value='".$fila[0]."'>
										<input  type='text' OnFocus='this.blur()' name='nombreEvento' value='".$fila2[0]."'>
								</div>		
								<div class='sesion_formulario'>
										<label class='label2'>Notificacion</label>
										<input  type='text' OnFocus='this.blur()' name='notificacionE' value='".$fila[3]."'>
								</div>	
								
								<div class='sesion_formulario'>
										<input type='hidden' name='tablaP' value='dejarPosponerNotEvento'>
										<input type='hidden' name='user' value='$usuario'>
										<input type='hidden' name='oculto' value=".$fila[4].">
										<input type='hidden' name='posponer' value=".$fila[5].">
										<button type='submit'  class='boton'>Dejar de Posponer</button>
										<script>function eliminarEventoP(){x=document.getElementById('tablaP');
													x.value = 'eliminarNotEvento';}</script>
										<button type='submit'  class='boton' onclick='eliminarEventoP'>Eliminar</button>
								</div>

						</form>
						<h3>--------------------------------------------------------------------------</h3>";
				}
			
}
?>


<?php /************************************************************************Grupos********************************************************************/ ?>

<?php
function agregarInvitadosGrupo($invitados, $user, $nombre){
	$invitadosGrupo = explode(";", $invitados);
	
	foreach($invitadosGrupo as $valor){
		$sql_query="Insert into Invitacion_grupo values ('$user', '$valor', '$nombre', 'false');";
		$consulta = pg_query($sql_query);
	}
}?>


<?php 
function notificacionGrupos($usuario){

$sql_query = "SELECT * from Notificacion_Grupo where usuario='$usuario' and oculto='false' and posponer='false' and estado='true'; ";
$consulta = pg_query($sql_query);

		while($fila=pg_fetch_row($consulta)){

				echo"
						<form name='gestionNotGrupos' action='actualizatabla.php' method='post'>
								<div class='sesion_formulario'>
										<label class='label2'>Grupo</label>
										<input  type='text' OnFocus='this.blur()' name='nombreGrupo' value='".$fila[0]."'>
								</div>		
								<div class='sesion_formulario'>
										<label class='label2'>Notificacion</label>
										<input  type='text' OnFocus='this.blur()' name='notificacionG' value='".$fila[3]."'>
								</div>	
								
								<div class='sesion_formulario'>
										<input type='hidden' id='tablaGa' name='tabla' value='ocultarNotGrupo'> 
										<input type='hidden' name='user' value='$usuario'>
										<input type='hidden' name='oculto' value=".$fila[4].">
										<input type='hidden' name='posponer' value=".$fila[5].">
										<button type='submit'  class='boton'>Ocultar</button>
										<script>function posponerGrupo(){x=document.getElementById('tablaGa');
													x.value = 'posponerNotGrupo';}</script>
										<button type='submit'  class='boton' onclick='posponerGrupo'>Posponer</button>
										<script>function eliminarGrupo(){x=document.getElementById('tablaGa');
													x.value = 'eliminarNotGrupo';}</script>
										<button type='submit'  class='boton' onclick='eliminarGrupo'>Eliminar</button>
								</div>

						</form>
						<h3>--------------------------------------------------------------------------</h3>";
				}
			
}
?>

<?php 
function notificacionGruposOcultos($usuario){

$sql_query = "SELECT grupo, mensaje from Notificacion_Grupo where usuario='$usuario' and oculto='true' and posponer='false' and estado='true'; ";
$consulta = pg_query($sql_query);


		while($fila=pg_fetch_row($consulta)){
				echo"

						<form name='gestionNotGrupos' action='actualizatabla.php' method='post'>
								<div class='sesion_formulario'>
										<label class='label2'>Grupo</label>
										<input  type='text' OnFocus='this.blur()' name='nombreGrupo' value='".$fila[0]."'>
								</div>		
								<div class='sesion_formulario'>
										<label class='label2'>Notificacion</label>
										<input  type='text' OnFocus='this.blur()' name='notificacionG' value='".$fila[1]."'>
								</div>	
								
								<div class='sesion_formulario'>
										<input type='hidden' name='tablaGb' value='dejarOcultarNotGrupo'> 						
										<input type='hidden' name='user' value='$usuario'>
										<input type='hidden' name='oculto' value=".$fila[4].">
										<input type='hidden' name='posponer' value=".$fila[5].">
										<button type='submit'  class='boton'>Dejar de Ocultar</button>
										<script>function eliminarGrupoO(){x=document.getElementById('tablaGb');
													x.value = 'eliminarNotGrupo';}</script>
										<button type='submit'  class='boton' onclick='eliminarGrupoO'>Eliminar</button>
								</div>

						</form>
						<h3>--------------------------------------------------------------------------</h3>";
				}
			
}
?>


<?php 
function notificacionGruposPospuestos($usuario){

$sql_query = "SELECT grupo, mensaje from Notificacion_Grupo where usuario='$usuario' and oculto='false' and posponer='true' and estado='true'; ";
$consulta = pg_query($sql_query);

		while($fila=pg_fetch_row($consulta)){

				echo"
						<form name='gestionNotGrupos' action='actualizatabla.php' method='post'>
								<div class='sesion_formulario'>
										<label class='label2'>Grupo</label>
										<input  type='text' OnFocus='this.blur()' name='nombreGrupo' value='".$fila[0]."'>
								</div>		
								<div class='sesion_formulario'>
										<label class='label2'>Notificacion</label>
										<input  type='text' OnFocus='this.blur()' name='notificacionG' value='".$fila[1]."'>
								</div>	
								
								<div class='sesion_formulario'>
										<input type='hidden' name='tablaGc' value='dejarPosponerNotGrupo'>
										<input type='hidden' name='user' value='$usuario'>
										<input type='hidden' name='oculto' value=".$fila[4].">
										<input type='hidden' name='posponer' value=".$fila[5].">
										<button type='submit'  class='boton'>Dejar de Posponer</button>
										<script>function eliminarGrupoP(){x=document.getElementById('tablaGc');
													x.value = 'eliminarNotGrupo';}</script>
										<button type='submit'  class='boton' onclick='eliminarGrupoP'>Eliminar</button>
								</div>

						</form>
						<h3>--------------------------------------------------------------------------</h3>";
				}
			
}
?>


<?php /**********************************************************Mensajes***********************************************************/ ?>

<?php //Muestra cantidad msj usuario 
function cantidadMensajes($usuario){
$sql_query = "SELECT count(*) from mensaje where usuario_dos='$usuario' and visto='false'";
$consulta = pg_query($sql_query);
$cuenta=pg_fetch_row($consulta);
$cantidad=$cuenta[0];
return $cantidad;
}
?>

<?php //Muestra mensajes enviados 
function mensajesEnviados($usuario){
$sql_query = "SELECT usuario_dos, fecha, mensaje_enviado FROM Mensaje where usuario_uno='$usuario';";
$consulta = pg_query($sql_query);
		while($fila=pg_fetch_row($consulta)){
				echo"<form name='gestionMEnviados' action='actualizatabla.php' method='post'>
						<div class='sesion_formulario'>
								<label class='label2'>Usuario</label>
								<input  type='text' OnFocus='this.blur()' name='usuario2' value='".$fila[0]."'>
						</div>		
						<div class='sesion_formulario'>
								<label class='label2'>Fecha</label>
								<input  type='text' OnFocus='this.blur()' name='fecha' value='".$fila[1]."'>
						</div>	
						<div class='sesion_formulario'>
								<label class='label2'>Mensaje</label>
								<textarea  type='text' OnFocus='this.blur()' name='mensaje' value='".$fila[2]."'></textarea>
						</div>
						<div class='sesion_formulario'>
								input type='hidden' name='tabla' value='eliminaMenEnviado'>
								<input type='hidden' name='user' value='$usuario'>
								<button type='submit'  class='boton'>Eliminar</button>
						</div>
					</form>";
				}
			
}
?>

<?php 
function mensajesRecibidos($usuario){
$sql_query = "SELECT * FROM Mensaje where usuario_dos='$usuario' and posponer='false' and oculto='false' and estado='true';";
$consulta = pg_query($sql_query);

		while($fila=pg_fetch_row($consulta)){
				echo"<form name='gestionMRecibidos' action='actualizatabla.php' method='post'>
						<div class='sesion_formulario'>
								<label class='label2'>Usuario</label>
								<input  type='text' OnFocus='this.blur()' name='usuario1' value='".$fila[0]."'>
						</div>			
						<div class='sesion_formulario'>
								<label class='label2'>Mensaje</label>
								<textarea  type='text' OnFocus='this.blur()' name='mensaje' value='".$fila[3]."'></textarea>
						</div>
						<div class='sesion_formulario'>
								<input type='hidden' id='tablaMa' name='tabla' value='ocultarMensaje'> 
								<input type='hidden' name='user' value='$usuario'>
								<input type='hidden' name='oculto' value=".$fila[4].">
								<input type='hidden' name='posponer' value=".$fila[5].">
								<button type='submit'  class='boton'>Ocultar</button>
								<script>function posponMensaje(){x=document.getElementById('tablaMa');
											x.value = 'posponerMensaje';}</script>
								<button type='submit'  class='boton' onclick='posponMensaje'>Posponer</button>
								<script>function eliminaMensaje(){x=document.getElementById('tablaMa');
											x.value = 'eliminarMensaje';}</script>
								<button type='submit'  class='boton' onclick='eliminaMensaje'>Eliminar</button>
						</div>
					</form>";
				}
			
}
?>

<?php 
function mensajesPospuestos($usuario){
$sql_query = "SELECT * FROM Mensaje where usuario_dos='$usuario' and posponer='true' and estado='true';";
$consulta = pg_query($sql_query);

		while($fila=pg_fetch_row($consulta)){
				echo"<form name='gestionMPospuestos' action='actualizatabla.php' method='post'>
						<div class='sesion_formulario'>
								<label class='label2'>Usuario</label>
								<input  type='text' OnFocus='this.blur()' name='usuario1' value='".$fila[0]."'>
						</div>			
						<div class='sesion_formulario'>
								<label class='label2'>Mensaje</label>
								<textarea  type='text' OnFocus='this.blur()' name='mensaje' value='".$fila[3]."'></textarea>
						</div>
						<div class='sesion_formulario'>
								<input type='hidden' name='tablaMb' value='dejarPosponerMensaje'>
								<input type='hidden' name='user' value='$usuario'>
								<input type='hidden' name='oculto' value=".$fila[4].">
								<input type='hidden' name='posponer' value=".$fila[5].">
								<button type='submit'  class='boton'>Dejar de Posponer</button>
								<script>function eliminarMensajeP(){x=document.getElementById('tablaMb');
											x.value = 'eliminarMensaje';}</script>
								<button type='submit'  class='boton' onclick='eliminarMensajeP'>Eliminar</button>
						</div>
					</form>";
				}
			
}
?>


<?php 
function mensajesOcultos($usuario){
$sql_query = "SELECT * FROM Mensaje where usuario_dos='$usuario' and oculto='true' and estado='true';";
$consulta = pg_query($sql_query);

		while($fila=pg_fetch_row($consulta)){
				echo"<form name='gestionMOcultos' action='actualizatabla.php' method='post'>
						<div class='sesion_formulario'>
								<label class='label2'>Usuario</label>
								<input  type='text' OnFocus='this.blur()' name='usuario1' value='".$fila[0]."'>
						</div>			
						<div class='sesion_formulario'>
								<label class='label2'>Mensaje</label>
								<textarea  type='text' OnFocus='this.blur()' name='mensaje' value='".$fila[3]."'></textarea>
						</div>
						<div class='sesion_formulario'>
								<input type='hidden' name='tablaMc' value='dejarOcultarMensaje'> 						
										<input type='hidden' name='user' value='$usuario'>
										<input type='hidden' name='oculto' value=".$fila[4].">
										<input type='hidden' name='posponer' value=".$fila[5].">
										<button type='submit'  class='boton'>Dejar de Ocultar</button>
										<script>function eliminarMensajeO(){x=document.getElementById('tablaMc');
													x.value = 'eliminarMensaje';}</script>
										<button type='submit'  class='boton' onclick='eliminarMensajeO'>Eliminar</button>
						</div>
					</form>";
				}
			
}
?>




<?php /**********************************************************perfil*************************************************************/ ?>


<?php //Buscamos el usuario y contraseña
function verificauser($user, $password){
$sql_query = "Select login, correo, usuario.nombre, apellido, apellido2, 
					sexo,universidad.nombre, identificacion, tipoid, 
					carrera.nombre 
					From usuario inner join universidad on usuario.universidad = universidad.universidad_id 
					inner join carrera on usuario.carrera = carrera.carrera_id 
					Where login = '$user' and pass = '$password' and usuario.estado=true;";
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





<?php /******************************************************Auxiliares*********************************************************************/?>
<?php //Recorremos tabla (modificado actualmente solo sirve para universidad)mostrnado campos especificos NOTA:modificare nombre apenas pueda
function recorre_tabla($nombret,$campot){
$sql_query= "Select $campot From $nombret where estado=true";
$consulta = pg_query($sql_query);
while($fila=pg_fetch_row($consulta)) 
 { echo "<option value='".$fila[1]."'>".$fila[0]."</option>"; } 
}
?>

<?php //Crea un select a partir de la opcion seleccionada en otro select
function recorre_tabla_anidada($nombreta, $nombretp, $selectDestino){
$sql_query= "Select * From $nombreta Where universidad = '$nombretp'";	
$consulta=pg_query($sql_query);
echo "<div><select name='$selectDestino' id='$selectDestino' onChange='cargaContenido(this.id)'>";
echo "<option value='0'>Seleccione $nombreta</option>";
while($fila=pg_fetch_row($consulta)){
	echo "<option value='".$fila[0]."'>".$fila[1]."</option>";}			
echo "</select></div>";	
}?>





<?php
function validarTamanoRango($variable, $tamano1, $tamano2){
	$valido = False;
		if(strlen($variable) >= $tamano1 && strlen($variable) <= $tamano2){
			$valido = True;
		}
	return $valido;
}?>

<?php
function validarTamano2($variable, $tamano1){
	$valido = False;
		if(strlen($variable) == $tamano1){
			$valido = True;
		}
	return $valido;
}?>

<?php
function validarEsNumerico($variable){
	$numero = False;
		if(is_numeric($variable)){
			$numero = True;
		}
	return $numero;
}?>

<?php
function validarFecha($dia, $mes, $anio){
	$valida=False;
	$validaD = validarTamano2($dia, 2);
	$validaM = validarTamano2($mes, 2);
	$validaA = validarTamano2($anio, 4);
	if($validaD && $validaM && $validaA){
		if(validarEsNumerico($dia) && validarEsNumerico($mes) && validarEsNumerico($anio)){
			$valida=True;
		}
	}
	return $valida;
}?>

<?php
function validarLetras($cadena){ 
	$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ "; 
	for ($i=0; $i<strlen($cadena); $i++){ 
		if (strpos($permitidos, substr($cadena,$i,1))===false){ 
		return false; 
		} 
	}  
	return true; 
}?>


