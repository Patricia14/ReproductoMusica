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
    <link href="../recursos/css/formulario.css" rel="stylesheet">
    <script type="text/javascript" src="../recursos/js/validaciones.js"></script>
</head>

<body>

    <div id="wrapper">

       <!-- Navigation -->
       <?php
         include('../menu/menuLateral.php');
       ?>
       <!-- End Navigation-->

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <form  method="POST" action="validar2.php" onsubmit="return validarContacto()">
                        <h1 class="page-header">
                            Contacto <small>Formulario de contacto</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="form-group">
                         <label for="inputName" class="control-label col-xs-2">Nombre:</label>
                         <div class="col-xs-10">
                         <input type="name" id="nombre" name="nombre" class="form-control" placeholder="Nombre"><br>
                    </div>
                </div>
                     <div class="form-group">
                         <label for="inputEmail" class="control-label col-xs-2">Email:</label>
                         <div class="col-xs-10">
                         <input type="email" id="email" name="email" class="form-control" placeholder="Email"><br>
                    </div>
                </div>
                     <div class="form-group">
                         <label for="inputPassword" class="control-label col-xs-2">Asunto:</label>
                         <div class="col-xs-10">
                         <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto"><br>
                         <textarea class="form-control" name="textarea" id="textarea" cols="20" rows="5" ></textarea>
                    </div>
                </div>
                <br>
                     <div class="form-group">
                        <div class="col-xs-offset-2 col-xs-10"><br>
                            <button type="submit" name="envio" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
                </form>
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
