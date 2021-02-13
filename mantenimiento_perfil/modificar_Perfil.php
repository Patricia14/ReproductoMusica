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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

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

require "../conexion/management.php";
$obj = new management();
$persona=$_SESSION["usuario_u"];
//echo $persona;
$dato=$obj->consulta("select * from usuario where correo_Usuario='$persona'");
 ?>
    <div id="wrapper">

        <!-- Navigation -->

       <?php
         require('../menu/menuLateral.php');
         $msgNombre="";
         $msgApellido="";
         $msgPassword="";
         $msgFoto="";
         $msgFecha="";
       if($_POST){

    include ("../mantenimiento_perfil/insercion_Perfil.php");
}

       ?>
       <!-- End Navigation-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
              
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Modificar perfil de usuario
                        </h1>
                          <?php foreach ($dato as $valor) {?>
                <form class="form-horizontal" method="POST" action="../mantenimiento_perfil/modificar_Perfil.php" id="formCliente" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="nombre" class="control-label col-xs-5">Nombre:</label>
                    <div class="col-xs-5">
                        <input id="txtnombre" name="txtnombre" type="text" class="form-control" placeholder="Ingrese su Email" value="<?php echo $valor["nombre_Usuario"];?>">
                        <div class="msg"><?php echo $msgNombre; ?></div>
                    </div>
                  </div>
                      <div class="form-group">
                    <label for="nombre" class="control-label col-xs-5">Apellido:</label>
                    <div class="col-xs-5">
                        <input id="txtapellido" name="txtapellido" type="text" class="form-control" value="<?php echo $valor["apellido_Usuario"];?>">
                        <div class="msg"><?php echo $msgApellido; ?></div>
                    </div>
                 </div>

                  <div class="form-group">
                    <label for="nombre" class="control-label col-xs-5">Password:</label>
                    <div class="col-xs-5">
                        <input id="txtpass" name="txtpass" type="password" class="form-control" value="<?php echo $valor["password_Usuario"];?>">
                        <div class="msg"><?php echo $msgPassword; ?></div>
                    </div>
                 </div>
                  <input type="hidden" id="imagenantigua" name="imagenantigua" value="<?php echo $valor["imagen_Usuario"];?>"/>
                 
                  <div class="form-group">
                    <label for="nombre" class="control-label col-xs-5">Imagen:</label>
                    <div class="col-xs-5">

                        <input id="txtimagen" name="txtimagen" type="file" class="form-control" >
                       <div class="msg"><?php echo $msgFoto; ?></div>
                    </div>
                 </div>
                  
                  <div class="form-group">
                    <label for="nombre" class="control-label col-xs-5">Fecha de Nacimiento:</label>
                    <div class="col-xs-5">
                       
                        <input class="date-own" name="txtedad" style="width: 300px;" type="text" value="<?php echo $valor["fechaNac_Usuario"];?>" readonly="readonly" />
                        <div class="msg"><?php echo $msgFecha; ?></div>
           

  <script type="text/javascript">
      $('.date-own').datepicker({
         viewMode: 'years',
         format: 'yyyy-mm-dd'
       });
  </script>
                    </div>
                 </div>
                          <input type="hidden" name="funcion" value="modificar"/>
<input type="hidden" name="id" value="<?php echo $valor["id_Usuario"]; ?>"/>
                 <?php }  ?>

              <div class="modal-footer">  
                <a href="../navegacion_usuario/perfil.php" class="btn btn-danger" role="button">Regresar</a>
                <input type="submit" name="envio" class="btn btn-success" value="Guardar">
                
              </div>
   
                         
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
