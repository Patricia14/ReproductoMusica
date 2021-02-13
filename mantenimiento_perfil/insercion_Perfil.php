<?php 

$errores=0;
$funcion=$_REQUEST["funcion"];

if ($funcion!="eliminar") {
	$imagenAnt=$_POST["imagenantigua"];
	$nombre=$_POST["txtnombre"];
	$apellido=$_POST["txtapellido"];
	$pass=$_POST["txtpass"];
	$edad=$_POST["txtedad"];


$foto=$_FILES["txtimagen"]["name"];
//echo "foto: ".$foto;

if (empty($nombre)) {
			$errores++;
			$msgNombre= "<center><div class=\"alert alert-warning\"> Debe colocar su nombre.</div>  </center>";
		}
if (empty($apellido)) {
			$errores++;
			$msgApellido= "<center><div class=\"alert alert-warning\"> Debe colocar su apellido.</div>  </center>";
		}
		if (empty($pass)) {
			$errores++;
			$msgPassword= "<center><div class=\"alert alert-warning\"> Debe colocar la contraseña.</div>  </center>";
		}
		if (empty($edad)) {
			$errores++;
			$msgEdad= "<center><div class=\"alert alert-warning\"> Debe su fecha de nacimiento.</div>  </center>";
		}
	
if (is_numeric($apellido)) { 
		$errores++;
			$msgApellido= "<center><div class=\"alert alert-warning\"> No se permiten numeros en este campo.</div>  </center>";
		
		} 

if ( is_numeric($apellido)) { 
		$errores++;
		$msgNombre= "<center><div class=\"alert alert-warning\"> No se permiten numeros en este campo.</div>  </center>";
				
		}
		if (empty($foto)) {
			
			
		}elseif ($_FILES['txtimagen']['type'] == "image/jpeg") {
    
        }elseif ($_FILES['txtimagen']['type'] == "image/png") {
    
        }else{
        $msgFoto= "<center> <div class=\"alert alert-warning\"> El formato de la imagen DEBE ser jpg o png. </div>  </center>";
         $errores++;
        } 

        if (!preg_match('/^\d{4}\-\d{2}\-\d{2}$/',$edad)) { 
			$errores++;
		 $msgFecha= "<center>Fecha no valida. <br> debe ingresar dia-mes-año</center>";

		}
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
			//echo $valor; 
			
			if (($valor > 15) && ($valor < 110)) {

if (empty($foto)){

//echo "No puso foto";
$obj = new management();

if ($funcion=="modificar") {
 
	$id=$_REQUEST["id"];
	
	$sql="update usuario set nombre_Usuario='$nombre', apellido_Usuario='$apellido', edad_Usuario='$valor', fechaNac_Usuario='$edad', password_Usuario='$pass', id_TipoUsuario='1' where id_Usuario=$id";
	$obj->mantenimiento($sql);
	echo $sql;
		$mensaje = "modificar"; 
	header("location: ../navegacion_usuario/perfil.php?m=$mensaje");

}else if($funcion=="eliminar"){

	$borrar=$_REQUEST["borrar"];
	$sql="delete from usuario where id_Usuario=$borrar";
	$obj->mantenimiento($sql);
	//echo $sql;
	$mensaje = "eliminar"; 
	header("location: ../navegacion_usuario/perfil.php?m=$mensaje");

}
}else{
	function __autoload($class){
    include_once("$class.php");
}
 
	$obj = new management();
	$id=$_REQUEST["id"];
	//echo "puso foto <br>";
$ruta=$_FILES["txtimagen"]["tmp_name"];
 $imagenU= "../recursos/images/img_usuario";
 opendir($imagenU);
$destino= $imagenU."/".$id."_".$foto;
unlink($imagenAnt);
copy($_FILES['txtimagen']['tmp_name'],$destino);


//copy($ruta,$destino);


	$sql="update usuario set nombre_Usuario='$nombre', apellido_Usuario='$apellido', edad_Usuario='$valor', fechaNac_Usuario='$edad', password_Usuario='$pass', imagen_Usuario='$destino', id_TipoUsuario='1' where id_Usuario=$id";
	$obj->mantenimiento($sql);
	//echo $sql;
		$mensaje = "modificar"; 
header("location: ../navegacion_usuario/perfil.php?m=$mensaje");

}

}
}else{
	$mensaje = "error"; 
	//header("location: ../navegacion_usuario/perfil.php?m=$mensaje");

}



 ?>
