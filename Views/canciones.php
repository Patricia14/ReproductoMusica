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
    <link href="recursos/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="recursos/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="recursos/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="recursos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
       <?php
         require('menutotal.php');
       ?>
       <!-- End Navigation-->
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Canciones <small>Pagina para mostrar todas las canciones</small>
                        </h1>
                         <center>
<object type="application/x-shockwave-flash" data="dewplayer-playlist.swf" width="240" height="200" id="dewplayer" name="dewplayer">
    <param name="wmode" value="transparent" />
    <param name="movie" value="dewplayer-playlist.swf" />
    <param name="flashvars" value="showtime=true&autoreplay=true&xml=playlist.xml" />
    </object>
</center>
        
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            require('/Views/lista_libros.php');
                        ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                       
                    </div>
                    <div class="col-lg-3 col-md-6">
                 
                    </div>
                    <div class="col-lg-3 col-md-6">
                    
                    </div>
                    <div class="col-lg-3 col-md-6">
                      
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="recursos/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="recursos/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="recursos/js/plugins/morris/raphael.min.js"></script>
    <script src="recursos/js/plugins/morris/morris.min.js"></script>
    <script src="recursos/js/plugins/morris/morris-data.js"></script>
<?php
    require('tabla.php');
?>
</body>

</html>
