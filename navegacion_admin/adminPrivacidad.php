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
      $datos=$obj->consulta("SELECT * FROM privacidad");

       ?>
       <!-- End Navigation-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                  <div class="col-lg-12">
                        <h1 class="page-header">
                            Mantenimiento de privacidad de lista
                        </h1>
                              <?php 
if($_REQUEST){

$msg= $_REQUEST['m'];
if ($msg=='insertar') {
echo "<center><div class='alert alert-success'><strong>¡Éxito!</strong> <br>Datos Guardados.</div></center>";
}else if ($msg=='eliminar') {
echo "<center><div class='alert alert-success'><strong>¡Éxito!</strong> <br>Datos Eliminado.</div></center>";
}else if ($msg=='modificar') {
echo "<center><div class='alert alert-success'><strong>¡Éxito!</strong> <br>Datos fueron modificados.</div></center>";
}else if($msg=='error'){
  echo "<div class='alert alert-danger'><center>
      <strong>¡Advertencia!</strong> <br>Los datos no fueron registrados.</center>
    </div>";
}

header( "refresh:2; ../navegacion_admin/adminPrivacidad.php");

}
 ?>
                        <a href="../mantenimiento_privacidad/insert_privacidad.php" class="btn btn-primary btn-lg active" role="button">Nueva privacidad en listas</a>
                        <br><br>
                         
                         <table class="table table-bordered">
                          <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Modificar</td>
                            <td>Eliminar</td>
                          </tr>
                          <?php foreach ($datos as $fila) {?>
                          <tr>
                          
                           <td><?php echo $fila["id_Privacidad"]; ?></td>
                            <td><?php echo $fila["nombre_Privacidad"]; ?></td>
                            <td> 
                            <?php echo "<a href=\"../mantenimiento_privacidad/modificar_privacidad.php?fila=".$fila["id_Privacidad"]."\">";
                            $id_privacidad= $fila["id_Privacidad"];?>

                                  <span class="glyphicon glyphicon-pencil"></span>
                                </a></td>
                                <td> 
                            <?php echo "<a  class=\"btn btn-success\" href=\"../mantenimiento_privacidad/insercion_privacidad.php?borrar=".$id_privacidad."&funcion=eliminar\">" ?>
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
                <h2 class="modal-title"> <center>¿Desea eliminar el privilegio?</center> </h2>
              </div>
              <div class="modal-body">
                
                <center>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <?php echo "<a  class=\"btn btn-success\" href=\"../mantenimiento_privacidad/insercion_privacidad.php?borrar=".$id_privacidad."&funcion=eliminar\">" ?>Eliminar</a>
                
               
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
