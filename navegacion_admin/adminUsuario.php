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
      $datos=$obj->consulta("SELECT id_Usuario, nombre_Usuario, apellido_Usuario, correo_Usuario, edad_Usuario, fechaNac_Usuario, password_Usuario, imagen_Usuario, nombre_TipoUsuario FROM usuario INNER JOIN tipousuario ON tipousuario.id_TipoUsuario = usuario.id_TipoUsuario WHERE usuario.id_TipoUsuario = '1'");

       ?>
       <!-- End Navigation-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                  <div class="col-lg-12">
                        <h1 class="page-header">
                            Mantenimiento de usuarios
                        </h1>
                              <?php 
if($_REQUEST){

$msg= $_REQUEST['m'];
if ($msg=='eliminar') {
echo "<center><div class='alert alert-success'><strong>¡Éxito!</strong> <br>Datos Eliminado.</div></center>";
}else if ($msg=='modificar') {
echo "<center><div class='alert alert-success'><strong>¡Éxito!</strong> <br>Datos fueron modificados.</div></center>";
}

header( "refresh:2; ../navegacion_admin/adminUsuario.php");

}
 ?>
                        <a href="../mantenimiento_usuario/insert_usuario.php" class="btn btn-primary btn-lg active" role="button">Nuevo usuario</a>
                        <br><br>
                         
                         <table class="table table-bordered">
                          <tr>
                            <td>ID</td>
                            <td>Nombre </td>
                            <td>Apellido </td>
                            <td>Correo</td>
                            <td>Edad</td>
                            <td>fecha Nacimiento</td>
                            
                            <td>Imagen</td>
                            <td>Tipo usuario</td>
                            <td>Modificar</td>
                            <td>Eliminar</td>
                          </tr>
                          <?php foreach ($datos as $fila) {?>
                          <tr>
                          
                            <td><?php echo $fila["id_Usuario"]; ?></td>
                            <td><?php echo $fila["nombre_Usuario"]; ?></td>
                            <td><?php echo $fila["apellido_Usuario"]; ?></td>
                            <td><?php echo $fila["correo_Usuario"]; ?></td>
                            <td><?php echo $fila["edad_Usuario"]; ?></td>
                            <td><?php echo $fila["fechaNac_Usuario"]; ?></td>
                            
                            <td><?php echo $fila["imagen_Usuario"]; ?></td>
                            <td><?php echo $fila["nombre_TipoUsuario"]; ?></td>

                            <td> 
                            <?php echo "<a href=\"../mantenimiento_usuario/modificar_usuario.php?fila=".$fila["id_Usuario"]."\">" ?>
                                  <span class="glyphicon glyphicon-pencil"></span>
                                </a></td>
                                <td> 
                            <?php echo "<a  class=\"btn btn-success\" href=\"../mantenimiento_usuario/insercion_usuario.php?borrar=".$fila["id_Usuario"]."&funcion=eliminar\">" ?>
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
                <h2 class="modal-title"> <center>¿Desea eliminar al usuario?</center> </h2>
              </div>
              <div class="modal-body">
                
                <center>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <?php echo "<a  class=\"btn btn-success\" href=\"../mantenimiento_usuario/insercion_usuario.php?borrar=".$fila["id_Usuario"]."&funcion=eliminar\">" ?>Eliminar</a>
                
               
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
