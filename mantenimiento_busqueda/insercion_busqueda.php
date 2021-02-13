<?php 
require ('../conexion/management.php');

$idCorreo=$_REQUEST["idCorreo"];
$idCancion=$_REQUEST["idCancion"];
$obj = new management();
$funcion=$_REQUEST["funcion"];
echo $funcion;

if ($funcion=="agregar") {

	$sql = "INSERT INTO cancion_usuario (id_CancionUsuario, id_Usuario, id_Cancion)";
 $sql .= "VALUES ('','".$idCorreo."','" . $idCancion . "')";
//echo $sql;
	$obj->mantenimiento($sql);
$mensaje = "modificar";
	header("location: ../navegacion_usuario/busqueda.php?m=".$mensaje."");

	}elseif ($funcion=="quitar") {
	

$verificar=$obj->consulta("select * from lista inner join detalle_lista on lista.id_Lista=detalle_lista.id_Lista where id_Usuario='".$idCorreo."' and id_Cancion='".$idCancion."'");

	if (count($verificar)==0) {
		
    }else{


		 foreach ($verificar as $valor) {
    $idlista=$valor["id_Lista"]; 
    $sql1="delete from detalle_lista where id_Cancion=$idCancion and id_Lista=$idlista";
	$obj->mantenimiento($sql1);

    }
	
	}


	$sql2="delete from cancion_usuario where id_Usuario=$idCorreo and id_Cancion=$idCancion";
	$obj->mantenimiento($sql2);
	
	$mensaje = "eliminar"; 
	//echo $mensaje;
	
	header("location: ../navegacion_usuario/busqueda.php?m=".$mensaje."");
	
}else{
	$mensaje = "error"; 
	header("location: ../navegacion_usuario/busqueda.php?m=".$mensaje."");
}




 ?>
