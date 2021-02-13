<?php 
require ('../conexion/management.php');

$funcion=$_REQUEST["funcion"];

if ($funcion!="eliminar") {
	$nombre=$_POST["txtnombre"];
	if (empty($nombre)) {
			$errores++;
			}else if (!preg_match("/[a-zA-z]\s*/", $nombre)){
            $errores++;
   	   }
}

if ($errores==0) {
$obj = new management();


if ($funcion=="modificar") {
	$id=$_REQUEST["id"];
	$sql="update tipousuario set nombre_TipoUsuario='$nombre' where id_TipoUsuario=$id";
	$obj->mantenimiento($sql);
	//echo $sql;
		$mensaje = "modificar"; 
	header("location: ../navegacion_admin/adminTipoUsuario.php?m=$mensaje");
}else if($funcion=="eliminar"){
	$borrar=$_REQUEST["borrar"];
	$sql="delete from tipousuario where id_TipoUsuario=$borrar";
	$obj->mantenimiento($sql);
	//echo $sql;
	$mensaje = "eliminar"; 
	header("location: ../navegacion_admin/adminTipoUsuario.php?m=$mensaje");

}else{

$sql = "INSERT INTO tipousuario (id_TipoUsuario, nombre_TipoUsuario)";
 $sql .= "VALUES ('','" . $nombre . "')";

	$obj->mantenimiento($sql);
	header("location: ../navegacion_admin/adminTipoUsuario.php");
	}
}else{
	$mensaje = "error"; 
	header("location: ../navegacion_admin/adminTipoUsuario.php?m=$mensaje");
}




 ?>
