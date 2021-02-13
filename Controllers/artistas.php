<?php 
	require_once("../Models/artistas.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new artistas();
		$r=$inst ->lista_artistas($valor);
		//print_r($r);
		echo json_encode($r);
	}


?>