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

    <title>Usuario Musica Online</title>

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
        
require "../conexion/management.php";
$obj = new management();
$datosLista=$obj->consulta("SELECT * FROM privacidad ");
         require('../menu/menuLateral.php');
         $sesion= $_SESSION["usuario_u"];
         $datos=$obj->consulta("select * from usuario where correo_Usuario='$sesion'");
       
       ?>
       <!-- End Navigation-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
              
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Datos del Listas
                        </h1>
                         
                <form class="form-horizontal" method="POST" action="../mantenimiento_listas/insercion_listas.php" id="formCliente">
                  <div class="form-group">
                    <label for="nombre" class="control-label col-xs-5">Nombre de Lista:</label>
                    <div class="col-xs-5">
                        <input id="txtnombre" name="txtnombre" type="text" class="form-control" ">
                    </div>
                 </div>
                  <div class="form-group">
                    <label for="nombre" class="control-label col-xs-5">privacidad:</label>
                    <div class="col-xs-5">
                      <select name="txtprivacidad" id="txtprivacidad">
 <?php foreach ($datosLista as $fila3) {

                               echo "<option value='".$fila3["id_Privacidad"]."'>".$fila3["nombre_Privacidad"]."</option>"; 

                          }?>
</select>
                    </div>
                 </div>
                 <div class="modal-footer">  
                <a href="../navegacion_usuario/listarep.php" class="btn btn-danger" role="button">Regresar</a>
                <input type="submit" name="envio" class="btn btn-success" value="Guardar">
                
              </div>
                           <input type="hidden" name="funcion" value="insertar"/>
                            <?php foreach ($datos as $fila) {?>
                            <input type="hidden" name="usuario" value="<?php echo $fila["id_Usuario"]; ?>"/>
                            <?php } ?>
                            
     </form>
             
       
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
