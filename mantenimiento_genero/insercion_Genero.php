<?php 
require ('../conexion/management.php');

$funcion=$_REQUEST["funcion"];

if ($funcion!="eliminar") {
	$nombre=$_POST["txtnombre"];
	$descripcion=$_POST["txtdescripcion"];
	
	if ( empty($descripcion) || empty($nombre) ) {
			$errores++;
			}else if (!preg_match("/[a-zA-z]\s*/", $nombre)){
            $errores++;
   	   }
}

if ($errores==0) {
$obj = new management();


if ($funcion=="modificar") {
	$id=$_REQUEST["id"];
	$sql="update genero set nombre_Genero='$nombre', descripcion_Genero='$descripcion' where id_Genero='$id'";
	$obj->mantenimiento($sql);
	//echo $sql;
		$mensaje = "modificar"; 
	header("location: ../navegacion_admin/adminGenero.php?m=$mensaje");
}else if($funcion=="eliminar"){
	$borrar=$_REQUEST["borrar"];
	$sql="delete from genero where id_Genero='$borrar'";
	$obj->mantenimiento($sql);
	//echo $sql;
	$mensaje = "eliminar"; 
	header("location: ../navegacion_admin/adminGenero.php?m=$mensaje");

}else{

$sql = "INSERT INTO genero (nombre_Genero, descripcion_genero)";
 $sql .= "VALUES ('" . $nombre . "','".$descripcion."')";

	$obj->mantenimiento($sql);
	header("location: ../navegacion_admin/adminGenero.php");
	}
}else{
	$mensaje = "error"; 
	header("location: ../mantenimiento_Genero/insert_Genero.php?m=$mensaje");
}




 ?>
