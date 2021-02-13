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
                        <h1 class="page-header3">
                            Creadores <br><small class="titulo">Los creadores mas kawaiis del mundo mundial</small>
                        </h1>                        
                    </div>
                </div>
             

                 <div class="col-lg-3 col-md-6">
                        <div class="ih-item square effect3 bottom_to_top"><a href="#">
                            <div class="img"><img src="../recursos/images/1.jpg" alt="img"></div>
                            <div class="info">
                              <h3>Kittim</h3>
                              <p>Editor en jefe</p>
                            </div></a></div>
                 </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="ih-item square effect3 bottom_to_top"><a href="#">
                            <div class="img"><img src="../recursos/images/3.jpg" alt="img"></div>
                            <div class="info">
                            <h3>Patricia</h3>
                            <p>Jefe de proyecto</p>
                            </div></a></div>
                    </div>

                        <div class="col-lg-3 col-md-6">                     
                            <div class="ih-item square effect3 bottom_to_top"><a href="#">
                                <div class="img"><img src="../recursos/images/4.jpg" alt="img"></div>
                                <div class="info">
                                <h3>Adan</h3>
                                <p>El Cerebro</p>
                                </div></a></div>
                        </div>


                        <div class="col-lg-32 col-md-6">
                            <div class="col-sm-6">
                            <div class="ih-item square effect3 bottom_to_top"><a href="#">
                                <div class="img"><img src="../recursos/images/2.jpg" alt="img"></div>
                                <div class="info">
                                <h3>Mario</h3>
                                <p>El morido :'v</p>
                                </div></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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