<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">-->
<?php 

	$errores=0;
	$nombre= $_POST['nombre'];
	$apellido= $_POST['apellido'];
	$edad=$_POST['edad'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$password_encriptado = md5($password);
	//tambien puede usarse sha1() para encriptar
	//$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
	//$funcion=$_REQUEST['funcion'];
	

	if (empty($_POST['envio'])) {
		if (empty($nombre)) {
			$errores++;
			$msgNombre= "<center> Debe colocar su nombre. </center>";
		}

		if (empty($apellido)) {
			$errores++;
			$msgApellido= "<center>Debe colocar su apellido. </center>";
		}
		if (empty($email)) {
			$errores++;
			$msgEmail = "<center>Debe colocar el correo.  </center>";
		
		}
		if (empty($edad)) {
			$errores++;
			$msgFecha= "<center>Debe colocar su edad.  </center>";
		}
		if (empty($password)) {
			$errores++;
			$msgPassword = "<center>Debe colocar password. </center>";
		}
		if (strlen($password)>12 && strlen($password)<6) {
			$errores++;
			$msgPassword = "<center>La contraseña debe contener de 6. </center>";
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		   
		} else {
			$errores++;
			$msgEmail= "<center> El correo no es valido. </center>";

		}

		if (is_numeric($nombre)&&is_numeric($apellido)) { 
		$errores++;
		echo "<div class='alert alert-danger'><center>
		  <strong>¡Advertencia!</strong><br> El nombre no debe llevar numeros.</center>
		</div>";

		}  

		if (!preg_match('/^\d{4}\-\d{2}\-\d{2}$/',$edad)) { 
			$errores++;
		 $msgFecha= "<center>Fecha no valida. <br> debe ingresar dia-mes-año</center>";

		}

	if ($errores==0) {
			function edad($fecha){
				//Toma fecha actual
				$dia = date("j");
				$mes = date("n");
				$anio = date("Y");
				$anioNac = substr($fecha,0,4);
				$mesNac = substr($fecha,5,2);
				$diaNac = substr($fecha,8,2);
				/*echo $diaNac;
				echo "<br>";
				echo $mesNac;
				echo "<br>";
				echo $anioNac;*/
				if ($mesNac>$mes) {
					$calculo = $anio-$anioNac-1;
					}elseif ($mes==$mesNac && $diaNac > $dia) {
						$calculo = $anio -$anioNac-1;
					}else {
						$calculo = $anio - $anioNac;
					}
					return $calculo;
			}
			
			$valor = edad($edad);
			//la edad de la persona:
			echo $valor; 
			
			if (($valor > 15) && ($valor < 110)) {
				// se verifica si existe ese correo


	include("../conexion/conexion.php");
	$proceso = $conexion->query("SELECT * FROM usuario where correo_Usuario='$email'");

if($resultado = mysqli_fetch_array($proceso)){

}
if($resultado['correo_Usuario']==$email){
	echo "<div class='alert alert-danger'><center>
		  <strong>¡Advertencia!</strong> <br>El correo ya ha sido usado.</center>
		</div>";
		//Cerrar la conexión
 $conexion->close();

}else{
	/*/insert

	$consulta = "INSERT INTO usuario (id_Usuario, nombre_Usuario, apellido_Usuario, correo_Usuario, edad_Usuario, fechaNac_Usuario, password_Usuario, imagen_Usuario, id_TipoUsuario)";
 $consulta .= "VALUES ('','" . $nombre . "', '" . $apellido . "', '" . $email . "', '" . $valor . "', '" . $edad . "', '" . $password . "','', '1')";
 $resultc = $conexion->query($consulta);
 if($resultc){
echo "<center><div class='alert alert-success'><strong>¡Éxito!</strong> <br>Datos guardados.</div></center>";
 } 
 //Cerrar la conexión
 $conexion->close();
*/
 require "../conexion/management.php";
 $obj = new management();
 $imagenU= "recursos/\images/\img_usuario/\usuario.png";

 	$sql = "INSERT INTO usuario (id_Usuario, nombre_Usuario, apellido_Usuario, correo_Usuario, edad_Usuario, fechaNac_Usuario, password_Usuario, imagen_Usuario, id_TipoUsuario)";
 $sql .= "VALUES ('','" . $nombre . "', '" . $apellido . "', '" . $email . "', '" . $valor . "', '" . $edad . "', '" . $password_encriptado . "','".$imagenU."', '1')";


 	//$sql="insert into usuario(id,nombre,sueldo,archivo) values ('$id','$nombre','$sueldo','$archivo')";

$resultc=$obj->mantenimiento($sql);
	if($resultc){
echo "<center><div class='alert alert-success'><strong>¡Éxito!</strong> <br>Datos guardados.</div></center>";
 } 


}

	
		}else{
 
echo "<div class='alert alert-danger'><center>
		  <strong>¡Advertencia!</strong> <br>Debe tener mas de 15 años.</center>
		</div>";
			
		}

		}
		
	}
	
 ?>
