<?php 
	require_once("../Models/canciones.php");
	
		$valor=$_POST['valor'];
		$inst = new libros();
		$r=$inst ->lista_canciones($valor);
		//print_r($r);
		echo json_encode($r);
	
?>