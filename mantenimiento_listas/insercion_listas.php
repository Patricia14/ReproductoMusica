<?php 
require ('../conexion/management.php');

$funcion=$_REQUEST["funcion"];
$errores=0;
if ($funcion!="eliminar") {
	$nombre=$_POST["txtnombre"];
	$privacidad=$_POST["txtprivacidad"];
	if (empty($nombre)) {
			$errores++;
			}else if (is_numeric($nombre)){
				$errores++;
			}
}

if ($errores==0) {
$obj = new management();


if ($funcion=="modificar") {
	$id=$_REQUEST["id"];
	$sql="update lista set nombre_Lista='$nombre', id_Privacidad='$privacidad' where id_Lista=$id";
	$obj->mantenimiento($sql);
	//echo $sql;
		$mensaje = "modificar"; 
	header("location: ../navegacion_usuario/listarep.php?m=$mensaje");
}else if($funcion=="eliminar"){
	$borrar=$_REQUEST["borrar"];

	$verificar=$obj->consulta("select * from detalle_lista where id_Lista=$borrar");

	if (count($verificar)==0) {
		
    }else{
    	foreach ($verificar as $valor) {
    	$sql1="delete from detalle_lista where id_Lista=$borrar";
	$obj->mantenimiento($sql1);
}
}

	$sql="delete from lista where id_Lista=$borrar";
	$obj->mantenimiento($sql);
	//echo $sql;
	$mensaje = "eliminar"; 
	header("location: ../navegacion_usuario/listarep.php?m=$mensaje");

}else{
	$nombreUsuario=$_REQUEST["usuario"];
$sql = "INSERT INTO lista (id_Lista, nombre_Lista, id_Usuario, id_Privacidad)";
 $sql .= "VALUES ('','" . $nombre . "','" . $nombreUsuario . "','" . $privacidad . "')";
//echo $sql;
	$obj->mantenimiento($sql);
	header("location: ../navegacion_usuario/listarep.php");
	}
}else{
	$mensaje = "error"; 
	header("location: ../navegacion_usuario/listarep.php?m=$mensaje");
}




 ?>
