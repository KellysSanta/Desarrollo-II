<?php
include "conexion.php";
switch($_POST["tabla"]){

case "agregarActividad":
$d1=$_POST["user"];
$d2=$_POST["nombreActividad"];
$d3=$_POST["fechaActividad"];
$d4=$_POST["lugarActividad"];
$d5=$_post["descripcionActividad"];
$sql_query= "Insert into Usuario_Agenda (usuario, nombre, fecha, lugar, descripcion) values ('$d1', '$d2', '$d3', '$d4', '$d5');"
$consulta = pg_query($sql_query);
}
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
$sql_query= "Update usuario set nombre='$d6', apellido='$d7', apellido2='$d8', tipoid='$d1', identificacion='$d2', sexo='$d3', correo='$d4', universidad = $d9 where login='$d5'";
$consulta = pg_query($sql_query);
break;

case "nuevousuario":
$d1=$_POST["nuser"];
$d2=$_POST["Universidad"];
$d3=$_POST["Carrera"];
$d4=$_POST["npassword"];
$d5=$_POST["npassword2"];
$d6=$_POST["mail"];
$sql_queryprueba = "Select * From usuario Where login = '$d1'";
$sql_querypruebamail = "Select * From usuario Where correo = '$d6'";
$result = pg_query($sql_queryprueba);
$resultmail = pg_query($sql_querypruebamail);
if($d4!=$d5){}
else if((pg_num_rows($result)==1)){}
else if((pg_num_rows($resultmail)==1)){}
else{
$sql_query="Insert into usuario(login, correo, pass, universidad, carrera, estado) values ('$d1','$d6','$d4',$d2,$d3, true)";
$consulta = pg_query($sql_query);}
break;

case "nuevauni":
$d1=$_POST["ciudad"];
$d2=$_POST["uni"];
$d3=$_POST["admin"];
$sql_queryprueba = "Select * From universidad Where nombre = '$d2'";
$result = pg_query($sql_queryprueba);
if((pg_num_rows($result)==1)){}
else{
$sql_query="Insert into universidad(nombre,ciudad,estado,admin_id)values('$d2','$d1',true,'$d3')";
$consulta = pg_query($sql_query);
}
break;

case "editauni":
$d1=$_POST["nciudad"];
$d3=$_POST["eadmin"];
$d2=$_POST["editauni"];
$d4=$_POST["nnomuni"];
$sql_query= "Update universidad set ciudad='$d1', admin_id='$d3', nombre='$d4' where universidad_id='$d2'";
$consulta = pg_query($sql_query);
break;

case "eliminaruni":
$d3=$_POST["eadmin"];
$d2=$_POST["editauni"];
$sql_query= "Update universidad set admin_id='$d3',estado=false where universidad_id='$d2'";
$consulta = pg_query($sql_query);
break;

case "nuevacar":
$d1=$_POST["editacar"];
$d2=$_POST["ncar"];
$d3=$_POST["admin"];
$sql_query="Insert into carrera(nombre,universidad,estado,admin_id)values('$d2',$d1,true,'$d3')";
$consulta = pg_query($sql_query);
break;

case "editacar":
$d1=$_POST["modcar"];
$d3=$_POST["unicar"];
$d4=$_POST["nnomuni"];
$d5=$_POST["eadmin"];
$sql_query= "Update carrera set universidad='$d3', nombre='$d4', admin_id='$d5' where carrera_id='$d1'";
$consulta = pg_query($sql_query);
break;

case "eliminarcar":
$d3=$_POST["eadmin"];
$d2=$_POST["modcar"];
$sql_query= "Update carrera set admin_id='$d3',estado=false where carrera_id='$d2'";
$consulta = pg_query($sql_query);
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
	$consulta = pg_query($sql_query);
}
break;

case "eliminaContacto":
$d1=$_POST["user"];
$d2=$_POST["contactoAEliminar"];
$sql_query = "delete from contacto where usuario_uno='$d1' and usuario_dos='$d2' ;";
$consulta = pg_query($sql_query);
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

case "nuevomensaje":
$d1=$_POST["destino"];
$sql_querydestino="Select login From usuario Where correo='$d1'";
$consulta = pg_query($sql_querydestino);
$fila=pg_fetch_row($consulta);
$d1=$fila[0];
$d2=$_POST["mensaje"];
$d3=$_POST["origen"];
$sql_query = "insert into mensaje values ('$d3', '$d1','01/01/1900','$d2',false,false,false,false);";
$consulta = pg_query($sql_query);
break;}

?>
