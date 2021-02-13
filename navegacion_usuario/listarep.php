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
         
       
       require ("../conexion/management.php");
      $obj = new management();
      $correousu=$_SESSION["usuario_u"];
      $datos=$obj->consulta("SELECT * FROM lista INNER JOIN usuario ON usuario.id_Usuario = lista.id_Usuario inner join privacidad on privacidad.id_Privacidad=lista.id_privacidad where correo_Usuario= '$correousu'");

       ?>
       <!-- End Navigation-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                  <div class="col-lg-12">
                        <h1 class="page-header">
                           Listas de reproducción

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

header( "refresh:2; ../navegacion_usuario/listarep.php");

}
 ?>
                        <a href="../mantenimiento_listas/insert_listas.php" class="btn btn-primary btn-lg active" role="button">Nueva lista de reproducción</a>
                        <br><br>
                          <?php  if(count($datos)==0) { 
echo "<div class='alert alert-danger'><center>
      <strong>¡Advertencia!</strong> <br>No existen listas de reproducciones.</center>
    </div>";
}else{ ?>


                         <table class="table table-bordered">
                          <tr>
                            <td>Nombre</td>
                            <td>Privacidad</td>
                            <td>Modificar</td>
                            <td>Eliminar</td>
                            <td>Agregar canción</td>
                            <td>Escuchar lista</td>
                          </tr>

                          <?php foreach ($datos as $fila) {?>

                          <tr>
                           <td><?php echo $fila["nombre_Lista"]; ?></td>
                            <td><?php echo $fila["nombre_Privacidad"]; ?></td>
                            <td> 
                            <center> <?php echo "<a class=\"btn btn-warning\" href=\"../mantenimiento_listas/modificar_listas.php?fila=".$fila["id_Lista"]."\">" ?>
                                 <span class="glyphicon glyphicon-pencil"></span>
                                </a></center></td>
                                <td> 
                             <center> <?php echo "<a  class=\"btn btn-danger\" href=\"../mantenimiento_listas/insercion_listas.php?borrar=".$fila["id_Lista"]."&funcion=eliminar\">" ?>
                                <span class="glyphicon glyphicon-trash"></span>
                                </a></center></td>
                                <td><center><?php echo "<a  class=\"btn btn-success\" href=\"../mantenimiento_listas/cancion_lista.php?lista=".$fila["id_Lista"]."\">" ?>
                                  <span class="glyphicon glyphicon-music"></span>
                                </a></center></td>
                                <td><center><?php echo "<a  class=\"btn btn-success\" href=\"../reproductor/escucharMusica.php?lista=".$fila["id_Lista"]."\">" ?>
                                  <span class="glyphicon glyphicon-headphones"></span>
                                </a></center></td>
                            </tr>
                        <?php } ?>
                         </table>
                        <?php }   ?>
                   </div>
                </div>
                <!-- /.row -->
              </div>
            <!-- /.container-fluid -->

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
