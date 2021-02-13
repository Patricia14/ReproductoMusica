<?php 
	class libros
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function lista_libros($valor)
		{


			$sql="SELECT album.id_Album,album.nombre_Album,artista.nombre_Artista
                     from album
                         inner join artista on album.id_Artista=artista.id_Artista WHERE nombre_Album like '%".$valor."%' OR artista.nombre_Artista like '%".$valor."%'";
			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();

		}
		function actualizar($idlib,$isbn,$titulo,$autor,$añop,$nrop,$ediccion,$idioma)
		{
			$sql="UPDATE libros SET isbn_libro = '$isbn',titulo_libro='$titulo',autor_libro='$autor'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}
		function eliminar($id){
			$sql="DELETE FROM libros WHERE id_libro='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}
	}


	
?>