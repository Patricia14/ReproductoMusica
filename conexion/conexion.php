<?php 
/*$conexion = new mysqli("localhost","root","","rm");
if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}*/
	define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBDATA", "reproductormusica");
$conexion = new mysqli(DBHOST, DBUSER, DBPASS, DBDATA);
if($conexion->connect_errno){
 die("No se ha podido conectar a MySQL: (" . $conexion->connect_errno . ")" . $conexion->connect_error);
}
$conexion->set_charset("utf8");
?>

