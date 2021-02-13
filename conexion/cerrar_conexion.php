<?php 
	mysql_close($conexion);
	session_start();
	session_destroy();
header("Location:../inicio/login.php");
 ?>