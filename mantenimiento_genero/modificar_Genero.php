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
<?php
$fila=$_GET["fila"];
require "../conexion/management.php";
$obj = new management();
$dato=$obj->consulta("select * from genero where id_Genero='$fila'");
 ?>
    <div id="wrapper">

        <!-- Navigation -->

       <?php
        
         require('../menu/menuLateralAdmin.php');
       
       ?>
       <!-- End Navigation-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
              
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Modificación del Género
                        </h1>
                          <?php foreach ($dato as $valor) {?>
                <form class="form-horizontal" method="POST" action="../mantenimiento_Genero/insercion_Genero.php" id="formCliente">
                  
                  <div class="form-group">
                    <label for="nombre" class="control-label col-xs-5">Nombre de Género:</label>
                    <div class="col-xs-5">
                        <input id="txtnombre" name="txtnombre" type="text" class="form-control" value="<?php echo $valor["nombre_Genero"];?>">
                    </div>
                 </div>

                    <div class="form-group">
                    <label for="nombre" class="control-label col-xs-5">Descripción:</label>
                    <div class="col-xs-5">
                        <textarea id="txtdescripcion" name="txtdescripcion" type="text" class="form-control" rows="10" cols="50" ><?php echo $valor["descripcion_Genero"];?> </textarea>
                    </div>
                  </div>
                  
                 <?php }  ?>

              <div class="modal-footer">  
                <a href="../navegacion_admin/adminGenero.php" class="btn btn-danger" role="button">Regresar</a>
                <input type="submit" name="envio" class="btn btn-success" value="Guardar">
                
              </div>
            <input type="hidden" name="funcion" value="modificar"/>
<input type="hidden" name="id" value="<?php echo $fila; ?>"/>
                         
                         </div>

           
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
