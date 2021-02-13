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
      $datos=$obj->consulta("SELECT id_Usuario, nombre_Usuario, apellido_Usuario, correo_Usuario, edad_Usuario, fechaNac_Usuario, password_Usuario, imagen_Usuario, nombre_TipoUsuario FROM usuario INNER JOIN tipousuario ON tipousuario.id_TipoUsuario = usuario.id_TipoUsuario WHERE usuario.id_TipoUsuario = '2'");
       ?>
       <!-- End Navigation-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Mantenimiento de Administradores
                        </h1>


                        
 <a href="../mantenimiento_administrador/insert_administrador.php" class="btn btn-primary btn-lg active" role="button">Nuevo Administrador</a>
<br>
                        <br><br>
             <table class="table table-bordered">
            <tr class="centro">
                <td>ID</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Edad</td>
                <td>Correo</td>
                <td>Contraseña</td>
                <td>tipo de usuario</td>
                <td>Modificar</td>
                <td>Eliminar</td>
            </tr>
            <tbody>
                <?php foreach ($datos as $fila) { ?>
                    <tr>
                         <td><?php echo $fila['id_Usuario'];?></td>
                         <td><?php echo $fila['nombre_Usuario'];?></td>
                         <td><?php echo $fila['apellido_Usuario'];?></td>
                         <td><?php echo $fila['edad_Usuario'];?></td>
                         <td><?php echo $fila['correo_Usuario'];?></td>
                         <td><?php echo $fila['password_Usuario'];?></td>
                        <td><?php echo $fila['nombre_TipoUsuario'];?></td>
                         <td> 
                            <?php echo "<a href=\"../mantenimiento_administrador/modificar_administrador.php?fila=".$fila["id_Usuario"]."\">" ?>
                                  <span class="glyphicon glyphicon-pencil"></span>
                                </a></td>
                                <td> 
                                
                            <?php echo "<a  class=\"btn btn-success\" href=\"../mantenimiento_administrador/insercion_administrador.php?borrar=".$fila["id_Usuario"]."&funcion=eliminar\">" ?>
                                  <span class="glyphicon glyphicon-trash"></span>
                                </a></td>
                    </tr>
                <?php } ?>
            </tbody>
         </table>

<div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Datos del nuevo Administrador</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido registrada</span>
                </div>

                <!--cambio-->
                <form class="form-horizontal" id="formCliente" method="POST" action="../inicio/sesion.php">
                <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Correo:</label>
                    <div class="col-xs-5">
                        <input id="email2" name="email" id="email"  type="email" class="form-control" placeholder="Ingrese su Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombres:</label>
                    <div class="col-xs-5">
                      <input id="nombres" name="nombre" id="nombre"  type="text" class="form-control" placeholder="Ingrese sus Nombres">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Apellidos :</label>
                    <div class="col-xs-5">
                      <input id="apellidos" name="apellido" id="apellido"   type="text" class="form-control" placeholder="Ingrese sus Apellidos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="edad" class="control-label col-xs-5">Edad :</label>
                    <div class="col-xs-5">
                      <input id="edad" name="edad" id="edad"  type="text" class="form-control" placeholder="Ingrese sus Edad">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass" class="control-label col-xs-5">Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass" name="password" id="password" type="password" class="form-control" placeholder="Ingrese su contraseña">
                    </div>
                  </div>
                  <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="envio"  id="envio" class="btn btn-success">Guardar</button>
                
              </div>
                  </div>
                   </form>
              
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
