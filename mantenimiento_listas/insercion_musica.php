<?php 
require ('../conexion/management.php');

$funcion=$_REQUEST["funcion"];
$obj = new management();
echo $funcion;
$nombreLista=$_REQUEST["lista"];
if ($funcion=="musica") {
	
	$song=$_REQUEST["song"];
	 
$sql = "INSERT INTO detalle_lista (id_DetalleLista, id_Cancion, id_Lista)";
 $sql .= "VALUES ('','" . $song . "','" . $nombreLista . "')";
//echo $sql;
	$obj->mantenimiento($sql);
	header("location: ../mantenimiento_listas/cancion_lista.php?lista=".$nombreLista."");
	//header("location: ../navegacion_usuario/listarep.php");
	}elseif ($funcion=="remover") {

	$song=$_REQUEST["song"];
	$sql="delete from detalle_lista where id_Cancion=$song and id_Lista=$nombreLista";
	$obj->mantenimiento($sql);
	//echo $sql;
	$mensaje = "eliminar"; 
	header("location: ../mantenimiento_listas/cancion_lista.php?lista=".$nombreLista."");
	
}else{
	$mensaje = "error"; 
	header("location: ../mantenimiento_listas/cancion_lista.php?lista=".$nombreLista."");
}




 ?>
