<?php

$server = "localhost";
$user = "root";
$pass = "";
$bd = "reproductormusica";
 $idLista=$_REQUEST['lista'];
//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
//$sql = "SELECT * FROM cancion";

 require ("../conexion/management.php");
 $obj = new management();
 $sesion= $_SESSION["usuario_u"];
         $datos=$obj->consulta("select * from usuario where correo_Usuario='$sesion'");

foreach ($datos as $fila) {
$valor = $fila["id_Usuario"];
}


$sql= "SELECT * FROM lista inner join detalle_lista on detalle_lista.id_Lista=lista.id_Lista inner join cancion on cancion.id_Cancion=detalle_lista.id_Cancion WHERE lista.id_Usuario='$valor' and lista.id_Lista='$idLista' and detalle_lista.id_Lista='$idLista'";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$clientes = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
	   $id=$row['id_reproduccion'];
    $nombre=$row['titulo_Cancion'];
    $artist=$row['version_Cancion'];
    $song=$row['ruta_Cancion'];
    $image=$row['imagen_Cancion'];
		
	

	$canciones[] = array('id'=> $id, 'nombre'=> $nombre, 'artist'=> $artist, 'song'=> $song,
						'image'=> $image,);

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
//$clientes['clientes'] = $clientes;
$json_string = json_encode($canciones);

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'clientes.json';
file_put_contents($file, $json_string);
*/
	

$nombre_archivo = "js/logs.json"; 
 
    if(file_exists($nombre_archivo))
    {
        unlink('js/logs.json');
    }
 
    else
    {
        $mensaje = "El Archivo $nombre_archivo se ha creado";
    }
 
    if($archivo = fopen($nombre_archivo, "a"))
    {
        if(fwrite($archivo, $json_string))
        {
           
        }
        else
        {
            
        }
 
        fclose($archivo);
    }


?>

