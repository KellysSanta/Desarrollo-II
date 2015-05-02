<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
"Universidad"=>"Universidad",
"Carrera"=>"Carrera"
);

function validaSelect($selectDestino){
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
}

$selectDestino=$_GET["select"]; 
$opcionSeleccionada=$_GET["opcion"];
if(validaSelect($selectDestino)){
	$tabla=$listadoSelects[$selectDestino];
	include "conexion.php";
	recorre_tabla_anidada($tabla, $opcionSeleccionada, $selectDestino);	
}
?>