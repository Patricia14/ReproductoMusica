<?php 
	class management{

		function __construct(){
			try{
				$host="localhost";
				$db_name="reproductormusica";
				$user="root";
				$pass="";

				$this->con=mysqli_connect($host,$user,$pass) or die ("Error en la conexion de BD");
				mysqli_select_db($this->con,$db_name) or die ("No se ha encontrado BD");

			}catch(Exception $ex){
				throw $ex;
				
			}
		}
		function consulta($sql){

			$res=mysqli_query($this->con,$sql);
			$data=NULL;
			while ($fila=mysqli_fetch_assoc($res)) {
				$data[]=$fila;
			}
			return $data;
		}

		function mantenimiento($sql){

			mysqli_query($this->con,$sql);
			if (mysqli_affected_rows($this->con)<=0) {
				echo "<div class='alert alert-danger'><center>
		  <strong>¡Advertencia!</strong> <br>Error en datos ingresados.</center>
		</div>";
			}else{
			echo "<center><div class='alert alert-success'><strong>¡Éxito!</strong> <br>Datos guardados.</div></center>";
			}
		}
		
	}

 ?>