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

   
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
       <?php
         include('../menu/menuLateral.php');
         
       $idLista=$_REQUEST['lista'];
       require ("../conexion/management.php");
      $obj = new management();
      $correousu=$_SESSION["usuario_u"];
      $dato=$obj->consulta("select * from usuario where correo_Usuario='$correousu'");
       foreach ($dato as $valor) {
    $idCorreo=$valor["id_Usuario"]; 
    }
      $datos=$obj->consulta("SELECT * FROM cancion inner join album on album.id_Album=cancion.album_Cancion inner join genero on genero.id_Genero=cancion.genero_Cancion inner join sello on sello.id_Sello=cancion.sello_Cancion inner join cancion_usuario on cancion_usuario.id_Cancion=cancion.id_Cancion where id_Usuario='$idCorreo'");

      $nombreLista=$obj->consulta("SELECT * FROM lista WHERE id_Lista='$idLista'");


       ?>
       <!-- End Navigation-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                  <div class="col-lg-12">
                        <h1 class="page-header">
                          Agregar a listas de reproducción: 
                          <?php foreach ($nombreLista as $fila1) {
                          
                           echo $fila1["nombre_Lista"]; 
                         }
                          ?>
                        </h1>
                              
                       
                        <br><br>
              <?php  if(count($datos)==0) { 
echo "<div class='alert alert-danger'><center>
      <strong>¡Advertencia!</strong> <br>No existen canciones para agregar.</center>
    </div>";
}else{ ?>           
                         <table class="table table-bordered">
                          <tr>
                            <td>Id</td>
                            <td>Titulo canción</td>
                            <td>Canción</td>
                            <td>Agregar canción</td>
                          </tr>

                          <?php foreach ($datos as $fila) {?>
                          <tr>
                          
                           <td><?php echo $fila["id_Cancion"]; ?></td>
                            <td><?php echo $fila["titulo_Cancion"]; ?></td>
                            <td><audio src="<?php echo $fila["ruta_Cancion"]; ?>" controlsList="nodownload"  preload="auto" controls></audio></td>
                            <?php $song =$fila["id_Cancion"]; ?>
                                
                              <td> <?php 
                                 $dato2=$obj->consulta("SELECT * FROM detalle_lista WHERE id_Cancion='$song' and id_Lista='$idLista'");
                                 /*foreach ($dato2 as $d) {
                                 echo $d["id_Cancion"];
                                 echo "lalal<br>";
                                 echo $d["id_Lista"];
                                 echo "<br>";
                                 }*/
                                 

                                 if(count($dato2)==0) { 
  echo "<center><a  class=\"btn btn-success\" href=\"../mantenimiento_listas/insercion_musica.php?lista=".$idLista."&funcion=musica&song=".$song."\"> 
                                  <span class=\"glyphicon glyphicon-music\"></span> Agregar a la lista
                                </a></center>";
}else{
  echo "<center><a  class=\"btn btn-danger\" href=\"../mantenimiento_listas/insercion_musica.php?lista=".$idLista."&funcion=remover&song=".$song."\"> 
                                  <span class=\"glyphicon glyphicon-remove\"></span> Quitar de la lista
                                </a></center>";
  }
                                 ?> 
                            </td>
                            </tr>

                        <?php } ?>
                        <td></td>
                         </table>
<?php } ?>
                   </div>
                </div>
                <!-- /.row -->
              </div>
            <!-- /.container-fluid -->
<div class="modal-footer">  
                <a href="../navegacion_usuario/listarep.php" class="btn btn-danger" role="button">Regresar</a>
              
              </div>
        </div>
        <!-- /#page-wrapper -->


    </div>

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
