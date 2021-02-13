<?php 
require ('../conexion/management.php');

$funcion=$_REQUEST["funcion"];

if ($funcion!="eliminar") {

	$nombre=$_POST["txtnombre"];
	
	$nacionalidad=$_POST["txtnacionalidad"];
	
	if (empty($nombre) && empty($nacionalidad)) {
			$errores++;
			}else if(!preg_match("/[a-zA-z]\s*/", $nacionalidad)){
   	   	$errores++;   	   	
   	   }
}

if ($errores==0) {
$obj = new management();


if ($funcion=="modificar") {
	$id=$_REQUEST["id"];
	$sql="update artista set nombre_Artista='$nombre', nacionalidad_Artista='$nacionalidad' where id_Artista='$id'";
	$obj->mantenimiento($sql);
	//echo $sql;
		$mensaje = "modificar"; 
	header("location: ../navegacion_admin/adminArtista.php?m=$mensaje");
}else if($funcion=="eliminar"){
	$borrar=$_REQUEST["borrar"];
	$sql="delete from artista where id_Artista='$borrar'";
	$obj->mantenimiento($sql);
	//echo $sql;
	$mensaje = "eliminar"; 
	header("location: ../navegacion_admin/adminArtista.php?m=$mensaje");

}else{

$sql = "INSERT INTO artista (nombre_Artista, nacionalidad_Artista)";
 $sql .= "VALUES ('" . $nombre . "','" . $nacionalidad . "')";

	$obj->mantenimiento($sql);
	header("location: ../navegacion_admin/adminArtista.php");
	}
}else{
	$mensaje = "error"; 
	header("location: ../mantenimiento_artista/insert_artista.php?m=$mensaje");
}




 ?>
