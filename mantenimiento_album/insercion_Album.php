<?php 
require ('../conexion/management.php');

$funcion=$_REQUEST["funcion"];
$errores=0;
if ($funcion!="eliminar") {

	$nombre=$_POST["txtnombre"];
	$id_artista=$_POST["txtartista"];
echo $id_artista;
	
	if ( empty($nombre)) {
			$errores++;
			}
}

if ($errores==0) {
$obj = new management();


if ($funcion=="modificar") {
	$id=$_REQUEST["id"];
	$sql="update album set nombre_Album='$nombre', id_Artista='$id_artista' where id_Album='$id'";
	$obj->mantenimiento($sql);
	//echo $sql;
		$mensaje = "modificar"; 
	header("location: ../navegacion_admin/adminAlbum.php?m=$mensaje");
}else if($funcion=="eliminar"){
	$borrar=$_REQUEST["borrar"];
	$sql="delete from album where id_Album='$borrar'";
	$obj->mantenimiento($sql);
	//echo $sql;
	$mensaje = "eliminar"; 
	header("location: ../navegacion_admin/adminAlbum.php?m=$mensaje");

}else{

$sql = "INSERT INTO album (nombre_Album, id_Artista)";
 $sql .= "VALUES ('" . $nombre . "','".$id_artista."')";

	$obj->mantenimiento($sql);
	header("location: ../navegacion_admin/adminAlbum.php");
	}
}else{
	$mensaje = "error"; 
	header("location: ../mantenimiento_album/insert_album.php?m=$mensaje");
}




 ?>
