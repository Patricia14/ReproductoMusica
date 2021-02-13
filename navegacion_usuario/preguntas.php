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
    <script src="../recursos/js/desplegable.js" type="text/javascript"></script>

   

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
                        <h1 class="page-header">
                            Preguntas Frecuentes <small>Espacio para preguntas sobre el servicio</small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <a href="#" onclick="cambiar('ejemplo'); return false;"><h3>¿Cuantas listas de reproduccion puedo tener?</h3></a>
                        <div id="ejemplo" style="display: none;">
                            <h5>Todas las que quieras! El limite es el cielo</h5>
                            </div>
                            <br>
                            <a href="#" onclick="cambiar('ejemplo2'); return false;"><h3>¿En que se basa el sistema para la seleccion del Top 10?</h3></a>
                                                    <div id="ejemplo2" style="display: none;">
                            <h5> El sistema obtiene las 10 canciones más reproducidas entre los usuarios.</h5>
                            </div>
                            <br>
                             <a href="#" onclick="cambiar('ejemplo3'); return false;"><h3>¿Qué clase de musica puedo encontrar?</h3></a>
                                                    <div id="ejemplo3" style="display: none;">
                            <h5>Inicialmente podras encontrar musica correspondiente al genero Metal satanico
                                pero con el tiempo agregaremos mas variedad. No olvides dejar en la zona de comentarios
                                el tipo de musica que te gustaria que incluyeramos</h5>
                            </div>
                            <br>
                            <a href="#" onclick="cambiar('ejemplo4'); return false;"><h3>Quisiera saber mas sobre el creador llamado Mario, ¿Como puedo hablar con el?</h3></a>
                                                    <div id="ejemplo4" style="display: none;">
                            <h5>En estos momentos eso puede resultar un tanto dificil. Actualmente "Mario" esta en un viaje por Narnia buscando comida para su Unicornio bebe, asi que no estara disponible por el momento. 
                                Pero en cuanto cruce por la estatua de Harry Potter cargando un sandilla, podra conectarse el wifi y se los haremos saber para que
                                hagan sus preguntas!</h5>
                            </div>
                            <br>
                            <a href="#" onclick="cambiar('ejemplo5'); return false;"><h3>¿Como se llama el hermano Vegano de Bruce Lee?</h3></a>
                                                    <div id="ejemplo5" style="display: none;">
                            <h5>Si, esta es una pregunta frecuente, lo creas o no.</h5>
                            </div>
                            <br>
                             <a href="#" onclick="cambiar('ejemplo6'); return false;"><h3>Se guardara mi informacion al cerrar sesion?</h3></a>
                                                    <div id="ejemplo6" style="display: none;">
                            <h5>Efectivamente.</h5>
                            </div>
                            <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <script src="../recursos/js/jquery.js"></script>

  
    <script src="../recursos/js/bootstrap.min.js"></script>

    
    <script src="../recursos/js/plugins/morris/raphael.min.js"></script>
    <script src="../recursos/js/plugins/morris/morris.min.js"></script>
    <script src="../recursos/js/plugins/morris/morris-data.js"></script>


<?php
    require('../menu/footer.php');
?>
</body>

</html>
