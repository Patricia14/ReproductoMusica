<?php
include("generarJSON.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="UTF-8">
	 <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="../css/listas.css">

	 <title>Player Marito</title>
</head>
<body>

	<!-- inicio de contenedor de reproductor -->
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
               <!-- <img src="img/foto1.jpg" width="300" alt=""> -->
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
               <img id="img-album" src="../img/foto2.jpg" width="504" alt="">
               <audio id="player" controls="" width="504" height="504"></audio>
               	<button type="button" value="Anterior" id="anterior"><img src="../img/an.png" width="50" heigth="50" alt=""></button>
			 	<button type="button" value="playme" id="playme">Puchame</button>
                <button type="button" value="Siguiente" id="siguiente"><img src="../img/siguiente.png" width="50" heigth="50" alt=""></button>

               <ul class="lista" id="playlist">
              </ul>
			</div>
			 <div class="col-md-6">
			 	<!-- <input type="button" value="Siguiente" id="siguiente"></button>
			 	<input type="button" value="Anterior" id="anterior"></button> -->
              <!-- <button class="btn btn-success" id="shuffle"><i class="fa fa-random"></i></button> -->
              
			</div>
		</div>
	</div>
<!-- fin de contenedor de reproductor -->

	<script src="../js/jquery.min.js"></script>
	<script src="https://use.fontawesome.com/5208c119b9.js"></script>
	<script src="../js/app.js"></script>
	


</body>
</html>