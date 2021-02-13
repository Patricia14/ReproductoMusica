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
	$sql="update sello set nombre_Sello='$nombre' where id_Sello=$id";
	$obj->mantenimiento($sql);
	//echo $sql;
		$mensaje = "modificar"; 
	header("location: ../navegacion_admin/adminSello.php?m=$mensaje");
}else if($funcion=="eliminar"){
	$borrar=$_REQUEST["borrar"];
	$sql="delete from sello where id_Sello=$borrar";
	$obj->mantenimiento($sql);
	//echo $sql;
	$mensaje = "eliminar"; 
	header("location: ../navegacion_admin/adminSello.php?m=$mensaje");

}else{

$sql = "INSERT INTO sello (id_Sello, nombre_Sello)";
 $sql .= "VALUES ('','" . $nombre . "')";

	$obj->mantenimiento($sql);
	header("location: ../navegacion_admin/adminSello.php");
	}
}else{
	$mensaje = "error"; 
	header("location: ../navegacion_admin/adminSello.php?m=$mensaje");
}




 ?>
