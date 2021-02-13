<?php 
require ('../conexion/management.php');

$funcion=$_REQUEST["funcion"];

if ($funcion!="eliminar") {
	$nombre=$_POST["txtnombre"];
	
	if (empty($nombre)) {
			$errores++;
			}else if(!preg_match("/[a-zA-z]\s*/", $nombre)){
   	   	$errores++;   	   	
   	   }
}

if ($errores==0) {
$obj = new management();


if ($funcion=="modificar") {
	$id=$_REQUEST["id"];
	$sql="update privacidad set nombre_Privacidad='$nombre' where id_Privacidad='$id'";
	$obj->mantenimiento($sql);
	//echo $sql;
		$mensaje = "modificar"; 
	header("location: ../navegacion_admin/adminPrivacidad.php?m=$mensaje");
}else if($funcion=="eliminar"){
	$borrar=$_REQUEST["borrar"];
	$sql="delete from privacidad where id_Privacidad='$borrar'";
	$obj->mantenimiento($sql);

	$mensaje = "eliminar"; 
	header("location: ../navegacion_admin/adminPrivacidad.php?m=$mensaje");

}else{

$sql = "INSERT INTO privacidad ( nombre_Privacidad)";
 $sql .= "VALUES ('" . $nombre . "')";

	$obj->mantenimiento($sql);
	$mensaje = "insertar"; 
	header("location: ../navegacion_admin/adminPrivacidad.php?m=$mensaje");
	}
}else{
	$mensaje = "error"; 
	header("location: ../navegacion_admin/adminPrivacidad.php?m=$mensaje");
}




 ?>
