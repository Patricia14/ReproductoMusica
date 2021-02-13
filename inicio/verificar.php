<?php 
session_start();
$errores=0;
$correo=$_POST['correo'];
$password=$_POST['pass'];
$password_encriptado = md5($password);
//echo $password_encriptado;
include("../conexion/conexion.php");

if (empty($correo)) {
			$errores++;
			$msgEmail= "<center> Debe colocar un correo. </center>";
			
		}

		if (empty($password)) {
			$errores++;
			$msgPassword= "<center>Debe colocar su contraseña. </center>";
		}
		if ($errores==0) {
$proceso = $conexion->query("SELECT * FROM usuario where correo_Usuario='$correo' AND password_Usuario='$password_encriptado'");

if($resultado = mysqli_fetch_array($proceso)){

}
if($resultado['id_TipoUsuario']==2){
	$_SESSION['usuario_u']=$correo;
header("Location:../navegacion_admin/admingenero.php");

} else if($resultado['id_TipoUsuario']==1){
	$_SESSION['usuario_u']=$correo;
header("Location:../navegacion_usuario/busqueda.php");

}else{
	echo "<div class='alert alert-danger'><center>
		  <strong>¡Advertencia!</strong> <br>Los datos no coinciden.</center>
		</div>";
		$pass_base = $resultado['password_Usuario'];
            echo $pass_base;

}
}
 ?>