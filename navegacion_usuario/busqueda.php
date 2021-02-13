<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Musica Online</title>

    <!-- Bootstrap Core CSS -->
    <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../recursos/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../recursos/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../recursos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../recursos/css/ihover.css" rel="stylesheet">
 <style>
        #playlist{
            list-style: none;
        }
        #playlist li{
            color:black;
            text-decoration: none;
        }
        #playlist .current-song{
            color:blue;
        }
       
</style>


   
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
       <?php
          include('../menu/menuLateral.php');
          require ("../conexion/management.php");
      $obj = new management();
      $datos=$obj->consulta("SELECT * FROM cancion");
      $correousu=$_SESSION["usuario_u"];
      $dato=$obj->consulta("select * from usuario where correo_Usuario='$correousu'");
       foreach ($dato as $valor) {
    $idCorreo=$valor["id_Usuario"]; 
    }
       ?>
       <!-- End Navigation-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Inicio <small> Puedes agregar música a tu lista general</small></h1>

                            <div class="input-group">
                             <?php 
if($_REQUEST){

$msg= $_REQUEST['m'];
if ($msg=='eliminar') {
echo "<center><div class='alert alert-success'><strong>¡Éxito!</strong> <br>Datos removido.</div></center>";
}else if ($msg=='modificar') {
echo "<center><div class='alert alert-success'><strong>¡Éxito!</strong> <br>Datos fueron modificados.</div></center>";
}else if($msg=='error'){
  echo "<div class='alert alert-danger'><center>
      <strong>¡Advertencia!</strong> <br>Los datos no fueron registrados.</center>
    </div>";
}

header( "refresh:2; ../navegacion_usuario/busqueda.php");

}
 ?>
                            <?php  if(count($datos)==0) { 
echo "<div class='alert alert-danger'><center>
      <strong>¡Advertencia!</strong> <br>No existen listas de reproducciones.</center>
    </div>";
}else{ ?>

<!--<audio src="" controls id="audioPlayer" >
        Lo sentimos, su navegador no soporta html5
    </audio>-->

                         
                          <ul id="playlist">
                       
  
                          <li class="current-song"></li>
                          <li>
                          <?php foreach ($datos as $fila) {?>
            
                          <div class="col-lg-3 col-md-6">

                        <div class="ih-item square effect3 bottom_to_top">
                        <?php   $idCancion= $fila["id_Cancion"]; 
                              
    $dato2=$obj->consulta("SELECT * FROM cancion_usuario WHERE id_Usuario='".$idCorreo."' and id_Cancion = '".$idCancion."'");
                 if(count($dato2)==0) { 
    echo " <form action=\"../mantenimiento_busqueda/insercion_busqueda.php\">
     <input type=\"hidden\" name=\"idCorreo\" value=\"$idCorreo\"/>
      <input type=\"hidden\" name=\"idCancion\" value=\"$idCancion\"/>
       <input type=\"hidden\" name=\"funcion\" value=\"agregar\"/>
   <center> <input type=\"submit\"  class=\"btn btn-success\" value=\"Agregar\" /></center>
</form>";
}else{ 
echo " <form action=\"../mantenimiento_busqueda/insercion_busqueda.php\">
     <input type=\"hidden\" name=\"idCorreo\" value=\"$idCorreo\"/>
      <input type=\"hidden\" name=\"idCancion\" value=\"$idCancion\"/>
      <input type=\"hidden\" name=\"funcion\" value=\"quitar\"/>
   <center> <input type=\"submit\"  class=\"btn btn-danger\" value=\"Quitar\" /></center>
</form>";
}
                                 ?> 
                        <a >
                            <div class="img"><img src="<?php echo $fila["imagen_Cancion"]; ?>" width="200" alt="img">
                            </div>
                            <div class="info">
                              <h3>Canción: </h3>

                              <p><?php echo $fila["titulo_Cancion"]; ?> 
                              
                              </p>
                            </div>
                            </a>
                        </div>
                 </div>


                        <?php } ?>
            </li>
       
    </ul>
    <script src="https://code.jquery.com/jquery-2.2.0.js"></script>
    <script src="audioPlayer.js"></script>
    <script>
        // loads the audio player
        audioPlayer();
    </script> 
    <?php }   ?>
                            </div>

                        
                    </div>
                </div>
                <!-- /.row -->
              </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../recursos/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../recursos/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../recursos/js/plugins/morris/raphael.min.js"></script>
    <script src="../recursos/js/plugins/morris/morris.min.js"></script>
    <script src="../recursos/js/plugins/morris/morris-data.js"></script>

    
<?php
    require('../menu/footer.php');
?>
</body>


</html>
