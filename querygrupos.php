<?php
include "conexion.php";

switch ($_REQUEST["functions"]) {
	case "seeAllGroups":
		$user = $_REQUEST["user"];
		$sqlSentence = "select * from grupo where administrador = '$user';";
		$consulta =  pg_query($sqlSentence);

		while ($fila = pg_fetch_row($consulta)) {
		echo "<form name = 'infoGrupos'  >
						<div class='sesion_formulario'>
							<label class='label2'>Nombre: </label>
							<input class='input' type='text' name ='nombreeditGrupo".$fila[0]."'  id = 'nombreeditGrupo".$fila[0]."' value = ".$fila[1].">
						</div>
						<div class='sesion_formulario'>		
							<label class='label2'>Descripción:</label>
							<input class='input' type='text'  name ='nombreeditGrupo".$fila[0]."'   id = 'descripGrup".$fila[1]."' value = ".$fila[2].">
						</div>
						<div class='sesion_formulario'>		
							<label class='label2'>Lista de usuarios</label>
							<input class='input' type='text' value = 'por hacer'>
						</div>
						<div class='sesion_formulario'>		
							<label class='label2'>Mensaje</label>
							<textarea class='cuerpo_mensaje' NAME='Texto'> 
							</textarea>	
						</div>
						<div class='sesion_formulario'>
							<input type='hidden' id='nombreGrupo' value= ".$fila[0].">
							<button type='button'   class='enviar_mensaje boton'>Enviar mensaje</button>
							<button type='button'  class='editar_grupo boton' id='editar_grupo'>Editar</button>
							<button type='button'  class='eliminar_grupo boton'>Eliminar</button>
						</div>
				</form>";
					
		}
		
	break;

	case "editGroup":
		$user = $_REQUEST["user"];
		$nombreGrupo = $_REQUEST["nombreGrupo"];
		$descripcion = $_REQUEST["descripcion"];
		$nombreeditGrupo = $_REQUEST["nombreeditGrupo"];
		$sqlSentence = "update grupo set nombre ='$nombreeditGrupo', descripcion = 'descripcion' where nombre = '$nombreGrupo' and administrador = '$user';";
		$consulta = pg_query($sqlSentence);
		if(pg_affected_rows($consulta)){
			echo "Se actulizó correctamente";
		}else{
			echo "Error al actualizar. Verifica tu informacion, puede que el nombre del grupo ya exista";
		}
	break;

	case "createGroup":
		$user = $_REQUEST["user"];
		$nombreGrupo = $_REQUEST["nombreGrupo"];
		$descripcion = $_REQUEST["descripcion"];
		$sqlSentence = "insert into grupo (nombre, descripcion, administrador, fechacreacion) values ('$nombreGrupo','$descripcion','$user', current_date);";
		
		if(pg_query($sqlSentence)){
			echo "Se ha creado el grupo correctamente";
		}else{
			echo "Error al crear grupo. Verifica tu informacion, puede que el nombre del grupo ya exista";
		}
	break;


}
?>


