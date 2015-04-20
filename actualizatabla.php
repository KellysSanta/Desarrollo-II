<?php
include "conexion.php";
switch($_POST["tabla"]){

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
$sql_query= "Update usuarios set nombre='$d6', apellido='$d7', apellido2='$d8', tipoid='$d1', identificacion='$d2', sexo='$d3', correo='$d4', universidad='$d9' where login='$d5'";
$consulta = pg_query($sql_query);
break;

case "nuevousuario":
$d1=$_POST["nuser"];
$d2=$_POST["universidad"];
$d3=$_POST["carrera"];
$d4=$_POST["npassword"];
$d5=$_POST["npassword2"];
$d6=$_POST["mail"];
$sql_queryprueba = "Select * From usuarios Where login = '$d1'";
$result = pg_query($sql_queryprueba);
if($d4!=$d5){}
else if((pg_num_rows($result)==1)){}
else{
$sql_query="Insert into usuarios(login, correo, pass, universidad, carrera, estado) values ('$d1','$d6','$d4','$d2','$d3', true)";
$consulta = pg_query($sql_query);}
break;

case "nuevauni":
$d1=$_POST["ciudad"];
$d2=$_POST["uni"];
$sql_queryprueba = "Select * From universidad Where nombre = '$d2'";
$result = pg_query($sql_queryprueba);
if((pg_num_rows($result)==1)){}
else{
$sql_query="Insert into universidad values ('$d2','$d1')";
$consulta = pg_query($sql_query);
}
break;

case "eliminaPerfil":
$d1=$_POST["user"];
$sql_query= "Update usuarios set estado = false where login = '$d1';";
$consulta = pg_query($sql_query);
break;

case "cambiaContrasena":
$d1=$_POST["user"];
$d2=$_POST["contrasena1"];
$d3=$_POST["contrasena2"];
if($d2 == $d3){
	$sql_query="update usuarios set pass='$d2';";
	$consulta = pg_query($sql_query);
}
break;

case "eliminaContacto":
$d1=$_POST["user"];
$d2=$_POST["contactoAEliminar"];
$sql_query = "delete from contacto where usuario_uno='$d1' and usuario_dos='$d2' ;";
$consulta = pg_query($sql_query);
$sql_query = "delete from contacto where usuario_dos='$d1' and usuario_uno='$d2' ;";
$consulta = pg_query($sql_query);
break;

case "agregaUsuario":
$d1=$_POST["user"];
$d2=$_POST["usuario2"];
$sql_query = "insert into contacto values ('$d1', '$d2', false, '01/01/1900');";
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

}




header('Location: index.php');
?>
