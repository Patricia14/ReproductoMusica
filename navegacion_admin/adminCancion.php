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

    <title>Administración Musica Online</title>

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
        
         require ('../menu/menuLateralAdmin.php');
       
       require ("../conexion/management.php");
      $obj = new management();
      $datos=$obj->consulta("SELECT * FROM cancion inner join album on album.id_Album=cancion.album_Cancion inner join genero on genero.id_Genero=cancion.genero_Cancion inner join sello on sello.id_Sello=cancion.sello_Cancion");

       ?>
       <!-- End Navigation-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                  <div class="col-lg-12">
                        <h1 class="page-header">
                            Mantenimiento de canciones
                        </h1>
                              <?php 
if($_REQUEST){

$msg= $_REQUEST['m'];
if ($msg=='eliminar') {
echo "<center><div class='alert alert-success'><strong>¡Éxito!</strong> <br>Datos Eliminado.</div></center>";
}else if ($msg=='modificar') {
echo "<center><div class='alert alert-success'><strong>¡Éxito!</strong> <br>Datos fueron modificados.</div></center>";
}else if($msg=='error'){
  echo "<div class='alert alert-danger'><center>
      <strong>¡Advertencia!</strong> <br>Los datos no fueron registrados.</center>
    </div>";
}

header( "refresh:2; ../navegacion_admin/adminCancion.php");

}
 ?>
                        <a href="../mantenimiento_cancion/insert_cancion.php" class="btn btn-primary btn-lg active" role="button">Nueva cancion</a>
                        <br><br>
                         
                         <table class="table table-bordered">
                          <tr>
                            <td>ID</td>
                            <td>Titulo</td>
                            <td>Genero</td>
                            <td>Version</td>
                            <td>Album</td>
                            <td>Duración</td>
                            <td>Sello</td>
                            <td>Rep.</td>
                            <td>Ruta de canción</td>
                            <td>Portada</td>
                            <td>Modificar</td>
                            <td>Eliminar</td>
                          </tr>
                          <?php foreach ($datos as $fila) {?>
                          <tr>
                          
                            <td><?php echo $fila["id_Cancion"]; ?></td>
                            <td><?php echo $fila["titulo_Cancion"]; ?></td>
                            <td><?php echo $fila["nombre_Genero"]; ?></td>
                            <td><?php echo $fila["version_Cancion"]; ?></td>
                            <td><?php echo $fila["nombre_Album"]; ?></td>
                            <td><?php echo $fila["duracion_Cancion"]; ?></td>
                            <td><?php echo $fila["nombre_Sello"]; ?></td>
                            <td><?php echo $fila["count_Cancion"]; ?></td>
                            <td>
                              <audio src="<?php echo $fila["ruta_Cancion"]; ?>" controlsList="nodownload" preload="auto" controls></audio>
                           </td>
                           <td><img src="<?php echo $fila["imagen_Cancion"]; ?>" width=70 height=70 ></td>
                            <td> 
                            <?php echo "<a class=\"btn btn-success\" href=\"../mantenimiento_cancion/modificar_cancion.php?fila=".$fila["id_Cancion"]."\">"; 
                            $idCancion=$fila["id_Cancion"];?>
                                  <span class="glyphicon glyphicon-pencil"></span>
                                </a></td>
                                <td> 
                            <?php echo "<a  class=\"btn btn-danger\" href=\"../mantenimiento_cancion/insercion_cancion.php?borrar=".$idCancion."&funcion=eliminar\">" ?>
                                  <span class="glyphicon glyphicon-trash"></span>
                                </a></td>
                            </tr>
                        <?php } ?>
                         </table>
                   </div>
                </div>
                <!-- /.row -->
              </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


    </div>
    <!-- /#wrapper -->

    <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title"> <center>¿Desea eliminar la canción?</center> </h2>
              </div>
              <div class="modal-body">
                
                <center>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <?php echo "<a  class=\"btn btn-success\" href=\"../mantenimiento_cancion/insercion_cancion.php?borrar=".$idCancion."&funcion=eliminar\">" ?>Eliminar</a>
                
               
                </center>
                  </div>
                  
            </div><!-- /.modal-content -->
                
              

          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
                    </div>
                </div>
                <!-- /.row -->
              </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

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
