<?php 
require ('../conexion/management.php');

$funcion=$_REQUEST["funcion"];

if ($funcion!="eliminar") {
	$nombre=$_POST["txtnombre"];
	$apellido=$_POST["txtapellido"];
	$correo=$_POST["txtcorreo"];
	$edad=$_POST["txtedad"];
	$fecha=$_POST["txtfecha"];
	$pass=$_POST["txtpass"];
	$imagen=$_POST["txtimagen"];

	if (empty($nombre) || empty($apellido) || empty($correo) || empty($edad) || empty($fecha) || empty($pass) || empty($imagen)  ) {
			$errores++;
			}else if (!preg_match("^/[a-zA-z]\s*/", $nombre)){
            $errores++;
   	   }else if (!preg_match("^/[a-zA-z]\s*/", $apellido)){
            $errores++;
   	   }else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
   	   	$errores++;
   	   }else if (!preg_match("/\d/", $edad)){
            $errores++;
   	   }
}
if ($errores==0) {
$obj = new management();


if ($funcion=="modificar") {
	$id=$_REQUEST["id"];
	$sql="update usuario set nombre_Usuario='$nombre', apellido_Usuario='$apellido', correo_Usuario='$correo', edad_Usuario='$edad', fechaNac_Usuario='$fecha', password_Usuario='$pass', imagen_Usuario='$imagen', id_TipoUsuario='1' where id_Usuario=$id";
	$obj->mantenimiento($sql);
	//echo $sql;
		$mensaje = "modificar"; 
	header("location: ../navegacion_admin/adminUsuario.php?m=$mensaje");
}else if($funcion=="eliminar"){
	$borrar=$_REQUEST["borrar"];
	$sql="delete from usuario where id_Usuario=$borrar";
	$obj->mantenimiento($sql);
	//echo $sql;
	$mensaje = "eliminar"; 
	header("location: ../navegacion_admin/adminUsuario.php?m=$mensaje");

}else{

$sql = "INSERT INTO usuario (id_Usuario, nombre_Usuario, apellido_Usuario, correo_Usuario, edad_Usuario, fechaNac_Usuario, password_Usuario, imagen_Usuario, id_TipoUsuario)";
 $sql .= "VALUES ('','" . $nombre . "','".$apellido."','".$correo."','".$edad."','','".$pass."','','1')";

	$obj->mantenimiento($sql);
	header("location: ../navegacion_admin/adminUsuario.php");
	}
}else{
	$mensaje = "error"; 
	header("location: ../navegacion_admin/adminTipoUsuario.php?m=$mensaje");
}




 ?>
