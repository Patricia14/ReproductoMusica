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
$titulo="";
  $genero="";
  $version="";
  $album="";
  $sello="";
$msgTitulo= "";
$msgVersion= "";
$msgFoto= "";

require "../conexion/management.php";
$obj = new management();
//$dato=$obj->consulta("select * from cancion where id_Cancion=$fila");

$dato=$obj->consulta("SELECT * FROM cancion inner join album on cancion.album_Cancion=album.id_Album 
inner join genero on cancion.genero_Cancion=genero.id_Genero
inner join sello on cancion.sello_Cancion=sello.id_Sello where id_Cancion='$fila'");
$datosGenero=$obj->consulta("SELECT * FROM genero ");
      $datosAlbum=$obj->consulta("SELECT * FROM album ");
      $datosSello=$obj->consulta("SELECT * FROM sello ");


if($_POST){

    include ("../mantenimiento_cancion/insercion_cancion.php");
}

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
                          Datos de canción

                        </h1>
                          <?php foreach ($dato as $valor) {?>
                <form class="form-horizontal" method="POST" action="../mantenimiento_cancion/modificar_cancion.php?fila=<?php echo $fila;?>" id="formCliente">
                  <div class="form-group">
                    <label for="titulo" class="control-label col-xs-5">Titulo:</label>
                    <div class="col-xs-5">
                        <input id="txttitulo" name="txttitulo" type="text" class="form-control" value="<?php echo $valor["titulo_Cancion"];?>">
                        <div class="msg"><?php echo $msgTitulo; ?></div>
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <label for="genero" class="control-label col-xs-5">Genero:</label>
                    <div class="col-xs-5">
               
                     <select  name="txtgenero" id="txtgenero">
                     <option value="<?php echo $valor["genero_Cancion"];?>"><?php echo $valor["nombre_Genero"];?></option>
                    

                         <?php foreach ($datosGenero as $fila3) {

                               echo "<option value='".$fila3["id_Genero"]."'>".$fila3["nombre_Genero"]."</option>"; 

                          }?>
                        </select>
               
                       
                    </div>
                  </div>
                   
                  <div class="form-group">
                    <label for="version" class="control-label col-xs-5">Version:</label>
                    <div class="col-xs-5">
                        <input id="txtversion" name="txtversion" type="text" class="form-control" value="<?php echo $valor["version_Cancion"];?>">
                        <div class="msg"><?php echo $msgVersion; ?></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="album" class="control-label col-xs-5">Album:</label>
                    <div class="col-xs-5">

<select name="txtalbum" id="txtalbum">
                       <option value="<?php echo $valor["id_Album"];?>"><?php echo $valor["nombre_Album"];?></option>
                         <?php foreach ($datosAlbum as $fila1) {

                               echo "<option value='".$fila1["id_Album"]."'>".$fila1["nombre_Album"]."</option>"; 

                          }?>
                        </select>
</select>

                       <!-- <input id="txtalbum" name="txtalbum" type="text" class="form-control"  value="<?php echo $valor["album_Cancion"];?>">-->
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sello" class="control-label col-xs-5">Sello:</label>
                    <div class="col-xs-5">
                    <select name="txtsello" id="txtsello">
                       <option value="<?php echo $valor["sello_Cancion"];?>"><?php echo $valor["nombre_Sello"];?></option>
                         <?php foreach ($datosSello as $fila1) {

                               echo "<option value='".$fila1["id_Sello"]."'>".$fila1["nombre_Sello"]."</option>"; 

                          }?>
                        </select>
</select>
                        
                    </div>
                  </div>
                 
                  

            <input type="hidden" name="funcion" value="modificar"/>
<input type="hidden" name="id" value="<?php echo $valor["id_Cancion"]; ?>"/>
                  
                 <?php }  ?>

              <div class="modal-footer">  
                <a href="../navegacion_admin/adminCancion.php" class="btn btn-danger" role="button">Regresar</a>
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
