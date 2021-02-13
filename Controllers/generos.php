<?php 
	require_once("../Models/generos.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new generos();
		$r=$inst ->lista_generos($valor);
		//print_r($r);
		echo json_encode($r);
	}
	
	
?>