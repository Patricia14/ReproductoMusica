
<?php 
//require ('../conexion/management.php');


$funcion=$_REQUEST["funcion"];
$errores = 0;

if (isset($_POST['envio'])) {

if ($funcion=="insertar") {

$titulo=$_POST["txttitulo"];
	$genero=$_POST["txtgenero"];
	$version=$_POST["txtversion"];
	$album=$_POST["txtalbum"];
	$sello=$_POST["txtsello"];
	//$imagen=$_POST["txtimagen"];

$foto=$_FILES["txtimagen"]["name"];
$cancionNombre=$_FILES["txtcancion"]["name"];

		if (empty($genero) || empty($album) || empty($sello) ) {
			$msgCombo= "<center><div class=\"alert alert-warning\"> Debe elegir una opción.</div>  </center>";
			$errores++;
		}
		if (empty($titulo)) {
			$errores++;
			$msgTitulo= "<center><div class=\"alert alert-warning\">
  Debe colocar el titulo de la canción.
</div>  </center>";
		}
		if (empty($version)) {
			$errores++;
			$msgVersion= "<center><div class=\"alert alert-warning\"> Debe colocar la version de la canción.</div>  </center>";
		}
		if (empty($foto)) {
			$errores++;
			$msgFoto= "<center> <div class=\"alert alert-warning\"> Debe seleccionar una portada. </div>  </center>";
		}elseif ($_FILES['txtimagen']['type'] == "image/jpeg") {
    
        }elseif ($_FILES['txtimagen']['type'] == "image/png") {
    
        }else{
        $msgFoto= "<center> <div class=\"alert alert-warning\"> El formato de la imagen DEBE ser jpg o png. </div>  </center>";
         $errores++;
        }
		if (empty($cancionNombre)) {
			$errores++;
			$msgCancion= "<center> <div class=\"alert alert-warning\"> Debe seleccionar una canción. </div>  </center>";

        }elseif ($_FILES['txtcancion']['type'] == "audio/mp3") {
    
        }else{
        $msgCancion= "<center> <div class=\"alert alert-warning\"> El formato de la canción DEBE ser mp3. </div>  </center>";
         $errores++;
        }


}

if ($funcion=="modificar") {
	$titulo=$_POST["txttitulo"];
	$genero=$_POST["txtgenero"];
	$version=$_POST["txtversion"];
	$album=$_POST["txtalbum"];
	$sello=$_POST["txtsello"];
	if (empty($genero) || empty($album) || empty($sello) ) {
			$errores++;
			}
			if (empty($titulo)) {
			$errores++;
			$msgTitulo= "<center> <div class=\"alert alert-warning\"> Debe colocar el titulo de la canción. </div>  </center>"; 
		}
		if (empty($version)) {
			$errores++;
			$msgVersion= "<center> <div class=\"alert alert-warning\"> Debe colocar el genero de la canción. </div>  </center>"; 
		}
}




if ($errores==0) {
$obj = new management();


	if ($funcion=="modificar") {
		$id=$_REQUEST["id"];
		echo $id;
		$sql="update cancion set titulo_Cancion='$titulo', genero_Cancion='$genero', version_Cancion='$version', album_Cancion='$album', sello_Cancion='$sello' where id_Cancion='$id'";
		$obj->mantenimiento($sql);
		//echo $sql;
		header("location: ../navegacion_admin/adminCancion.php");
		}else{

		$sql = "INSERT INTO cancion (titulo_Cancion, genero_Cancion, version_Cancion, album_Cancion, sello_Cancion, count_Cancion)";
		 $sql .= "VALUES ('" . $titulo . "', '" . $genero . "', '" . $version . "', '" . $album . "', '" . $sello . "', '0')";
		$obj->mantenimiento($sql);

		$obj = new management();
		 $seleccion=$obj->consulta("SELECT id_Cancion FROM cancion where titulo_Cancion='$titulo'");
		 foreach ($seleccion as $valor) {
		 	$idcancion=$valor["id_Cancion"];
		 }

		 $carpeta = "../recursos/song";
		    opendir($carpeta);
		    $archivo = $carpeta."/".$idcancion.".mp3";
		    copy($_FILES['txtcancion']['tmp_name'],$archivo);
		      echo "Archivo subido exitosamente <br>";
		     require('mp3file.class.php');
		    $mp3file = new MP3File($archivo);
		    $duration2 = $mp3file->getDuration();

		    $duracion= MP3File::formatTime($duration2);

		 $ruta=$_FILES["txtimagen"]["tmp_name"];
		 $imagenU= "../recursos/images/img_album";
		 opendir($imagenU);
		$destino= $imagenU."/".$idcancion;
		copy($_FILES['txtimagen']['tmp_name'],$destino);



		    //echo $duracion;

		//$sql = "INSERT INTO cancion (titulo_Cancion, genero_Cancion, version_Cancion, album_Cancion, duracion_Cancion, sello_Cancion, count_Cancion, ruta_Cancion, imagen_Cancion)";
		 //$sql .= "VALUES ('" . $titulo . "', '" . $genero . "', '" . $version . "', '" . $album . "', '" . $duracion . "', '" . $sello . "', '0', '" . $archivo . "', '" . $imagen . "')";

			$sql1="update cancion set duracion_Cancion='$duracion', ruta_Cancion='$archivo', imagen_Cancion='$destino' where id_Cancion=$idcancion";
			$obj->mantenimiento($sql1);


		header("location: ../navegacion_admin/adminCancion.php");
			}
}else{
	
}

}

if($funcion=="eliminar"){
	 require ("../conexion/management.php");
	$borrar=$_REQUEST["borrar"];
	$obj = new management();
 $seleccion=$obj->consulta("SELECT * FROM cancion where id_Cancion='$borrar'");
 foreach ($seleccion as $valor) {
 	$rutaCancion=$valor["ruta_Cancion"];
 	$imagenCancion=$valor["imagen_Cancion"];
}
	unlink($rutaCancion);
	unlink($imagenCancion);
	
	$sql="delete from cancion where id_Cancion=$borrar";
	$obj->mantenimiento($sql);
	
	//echo $sql;
	$mensaje = "eliminar"; 
	header("location: ../navegacion_admin/adminCancion.php?m=$mensaje");

}


 ?>
