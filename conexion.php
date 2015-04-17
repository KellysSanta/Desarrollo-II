<?php //Creamos las variables de conexion
$server = "localhost";
$db_name = "Redsocialid";
$log = "Admin";
$pass = "Admin";
$port = "5432";
$cadena_con= "host=$server port=$port dbname=$db_name user=$log password=$pass";

//Conectamos con la cadena de conexion
$con = pg_connect($cadena_con) or die ('Ha fallado la conexion');
?>
<?php //Buscamos el usuario y contraseña
function verificauser($user, $password){
$sql_query = "Select * From usuarios Where login = '$user' and pass = '$password' and estado = true";
$result = pg_query($sql_query);
return $result;
}?>
<?php //Miramos si es Admin
function esadmin($user){
$sql_queryadmin = "Select * From admins natural join usuarios AS datosadmin Where login = '$user'";	
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

function buscarContactoNombre($nombreU, $universidadU){
	
	if($universidadU == "No conozco la universidad"){
		$sql_query = "Select nombre, login from Usuario where nombre LIKE '%$nombreU%';";
		$consulta= pg_query($sql_query);
		while($fila=pg_fetch_row($consulta))
			{
				echo"<div class='sesion_formulario'>
							<label class='label2' name=".$fila[1].">".$fila[0]."</label>
							<button type='submit' class='boton'>Agregar</button>
				</div>";
			}
	}else{
		$sql_query = "select nombre, login from usuario inner join (Select universidad_id from  universidad where nombre ='$universidadU') as A on usuario.universidad = A.id where nombre LIKE upper('%$nombreU%');";
		$consulta= pg_query($sql_query);
		while($fila=pg_fetch_row($consulta))
			{
				echo"<div class='sesion_formulario'>
							<label class='label2' name=".$fila[1].">".$fila[0]."</label>
							<button type='submit' class='boton'>Agregar</button>
				</div>";
			}
	}
}
	
}?>
