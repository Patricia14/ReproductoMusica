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
      <script src="../recursos/js/desplegable.js" type="text/javascript"></script>
</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
       <?php
           include('../menu/menuLateral.php');
                  require ("../conexion/management.php");
      $obj = new management();
      $sesion= $_SESSION["usuario_u"];
      $datos=$obj->consulta("select * from usuario where correo_Usuario='$sesion'");
        ?>
       <!-- End Navigation-->

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Mi Perfil <small><br>Informacion de la cuenta</small>
                            <a href="../mantenimiento_perfil/modificar_Perfil.php" class="btn btn-primary btn-lg active" role="button">Modificar datos</a>
                       </h1>
                    </div>      

                    <div class="row">
                        <div class="col-sm-6">

                            <!-- normal --> 
                            <?php foreach ($datos as $fila) {?>
                            <div class="ih-item circle effect1"><a href="#">
                                <div class="spinner"></div>
                                <div class="img"><img src="<?php echo $fila["imagen_Usuario"]; ?>" alt="img"></div>
                                
                                <div class="info">
                                  <div class="info-back">
                                  
                                    <h3><?php echo $fila["nombre_Usuario"]; ?></h3>
                                    <p><?php echo $_SESSION["usuario_u"]; ?></p>
                                  </div>
                                </div></a>
                            </div>
                            <!-- end normal -->
                        </div>

                        <div class="col-sm-6">
                            <h4 class="page-header2">
                                 Nombre: <small><br><?php echo $fila["nombre_Usuario"]. " ".  $fila["apellido_Usuario"]; ?></small>
                              </h4>

                              <h4 class="page-header2">
                                 Correo: <small><br><?php echo $_SESSION["usuario_u"]; ?></small>
                              </h4>

                                <h4 class="page-header2">
                                 Edad: <small><br><?php echo $fila["edad_Usuario"]; ?></small>
                                </h4>
                                <h4 class="page-header2">
                                 Fecha de nacimiento: <small><br><?php echo $fila["fechaNac_Usuario"]; ?></small>
                                </h4>
                         
                                 <?php } ?>
                         
                        </div>
                        <br>

                    </div>
                </div>            
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
