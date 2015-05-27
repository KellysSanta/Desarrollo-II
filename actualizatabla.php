<?php
include "conexion.php";
switch($_POST["tabla"]){
	
case "nuevousuario":
echo "<script type='text/javascript'> aler('dsasd');</script>";
$d1=$_POST["nuser"];
$d2=$_POST["Universidad"];
$d3=$_POST["Carrera"];
$d4=$_POST["npassword"];
$d5=$_POST["npassword2"];
$d6=$_POST["mail"];
$sql_queryprueba = "Select * From usuario Where login = '$d1'";
$result = pg_query($sql_queryprueba);
if($d4!=$d5){}
else if((pg_num_rows($result)==1)){}
else{
$sql_query="Insert into usuario(login, correo, pass, universidad, carrera, estado) values ('$d1','$d6','$d4',$d2,$d3, true)";
$consulta = pg_query($sql_query);}
header('Location: http://localhost/index.php');
break;	

case "datospersonales":
$d1=$_POST["tipodoc"];
$d2=$_POST["doc"];
$d3=$_POST["sex"];
$d4=$_POST["mail"];
$d5=$_POST["user"];
$d6=$_POST["nom"];
$d7=$_POST["apellido"];
$d8=$_POST["apellido2"];
$d9=$_POST["universidad"];
$d10=$_POST["pass"];
$sql_query= "Update usuario set nombre=upper('$d6'), apellido='$d7', apellido2='$d8', tipoid='$d1', identificacion='$d2', sexo='$d3', correo='$d4', universidad = $d9 where login='$d5';";
$consulta = pg_query($sql_query);
break;

case "agregarEstudio":
$d1=$_POST["user"];
$d2=$_POST["estudioNuevo"];
$sql_query="Insert into Estudio_Usuario values('$d1', '$d2', 'true');";
$consulta= pg_query($sql_query);
break;

case "eliminarEstudio":
$d1=$_POST["user"];
$d2=$_POST["estudio"];
$sql_query="Update Estudio_Usuario set estado='false' where usuario_id='$d1' and estudio='$d2';";
$consulta= pg_query($sql_query);
break;

case "eliminaPerfil":
$d1=$_POST["user"];
$sql_query= "Update usuario set estado = false where login = '$d1';";
$consulta = pg_query($sql_query);
break;

case "cambiaContrasena":
$d1=$_POST["user"];
$d2=$_POST["contrasena1"];
$d3=$_POST["contrasena2"];
if($d2 == $d3){
	$sql_query="update usuario set pass='$d2' where login='$d1';";
	$consulta = pg_query($sql_query);}
break;

case "agregaUsuario":
$d1=$_POST["loginyo"];
$d2=$_POST["login"];
$sql_query = "insert into contacto values ('$d1', '$d2', false, current_date);";
$consulta = pg_query($sql_query);
break;

case "buscaUsuario":
$d1=$_POST["bNombre"];
$d2=$_POST["bUniversidad"];
$arregloresultante= verificaBusquedaNombre($d1, $d2);
if (pg_num_rows($arregloresultante) >= 1){
	buscarContactoNombre($d1, $d2);
}else{
	echo"<div class='sesion_formulario'>
						<h3>No hay resultados</h3>
		</div>";
}
break;

case "consultaContacto":
$d1=$_POST["user"];
$d2=$_POST["consultaA"];
consultarContactos($d2, $d1);
break;

case "eliminarContacto":
$user = $_POST["login"];
$contacto = $_POST["contacto"];
$sql_query = "update contacto set solicitud = false where usuario_uno = '$user' and usuario_dos = '$contacto';" ;
$sql_query1 = "update contacto set solicitud = false where usuario_dos = '$user' and usuario_uno = '$contacto';" ;
$consulta= pg_query($sql_query);
$consulta1= pg_query($sql_query1);
break;

case "aceptarSolicitud":
$d1=$_POST["user"];
$d2=$_POST["loginSol"];
$sql_query = "update contacto set solicitud = true where usuario_uno = '$d2' and usuario_dos = '$d1';" ;
$consulta= pg_query($sql_query);
break;

case "eliminarSolicitud":
$d1=$_POST["user"];
$d2=$_POST["loginSol"];
$sql_query = "Delete from contacto where usuario_uno = '$d2' and usuario_dos = '$d1';" ;
$consulta= pg_query($sql_query);
break;

/***********************************************************************Agenda****************************************************************************/ 

case "agregarActividad":
$d1=$_POST["user"];
$d2=$_POST["nombreActividad"];
$d3=$_POST["fechaActividad1"];
$d6=$_POST["lugarActividad"];
$d7=$_POST["descripcionActividad"];
$sql_query= "Insert into Usuario_Agenda (usuario, nombre, fecha, lugar, descripcion) values ('$d1', '$d2', '$d3', '$d6', '$d7');";
$consulta = pg_query($sql_query);
$sql_query = "select pass from usuario where login='$d1';";
$consultpass = pg_query($sql_query);
$passrow = pg_fetch_row($consultpass); 
$pass = $passrow[0];
break;

case "consultaactividad":
$user=$_POST["user"];
$fecha=$_POST["fechaActividad"];
consultaActividad($user, $fecha);
break;

case "'editarActividad":
$d1=$_POST["numero"];
$d3=$_POST["nombreAct"];
$d4=$_POST["lugarAct"];
$d5=$_POST["descAct"];
$sql_query = "update Usuario_Agenda set nombre = '$d3', lugar='$d4', descripcion='$d5' where num_actividad = $d1;" ;
$consulta= pg_query($sql_query);
break;

case "eliminaActividad":
$numero=$_POST["numero"];
$sql_query="Delete from Usuario_Agenda where num_actividad=$numero;";
$consulta= pg_query($sql_query);
break;


}?>