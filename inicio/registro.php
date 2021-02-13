<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Inicio</title>
  <!--Formato de calendario--><link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="../recursos/css/style2.css">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<?php 
$msgNombre= "";
$msgApellido= "";
$msgEmail= "";
$msgFecha="";
$msgPassword="";
$nombre="";
$apellido="";
$edad="";
$email="";
$password="";
$funcion="";
if($_POST){

    include("../inicio/sesion.php");
}
 
       ?>
       
<body>
  <div class="form">
 <!-- <center>
       <img src="../recursos/images/logo.png" height="200px" width="200px">
  </center>-->
      <ul class="tab-group">
      <li > <a href="login.php"> <button class="button"/>Iniciar Sesión</button></a></li>
       <li >  <a href="registro.php"> <button class="button"/>Registro de usuario</button></a></li > 
    
      </ul>
<!--Registrarse-->
      
           <h1>Registro de usuario</h1>
         
          <form method="post" action="registro.php">
          <div class="top-row">
            <div class="field-wrap">
              <p>Nombre:</p>
              <input type="text" name="nombre" value="<?php echo $nombre;?>" />
              <div class="msg"><?php echo $msgNombre; ?></div>
        
            </div>
        
            <div class="field-wrap">
              <p>Apellido: </p>
              <input type="text" name="apellido" value="<?php echo $apellido;?>" />
               <div class="msg"><?php echo $msgApellido; ?></div>
            </div>
          </div>

          <div class="field-wrap">
             <p>Correo electrónico: </p>
            <input type="text" name="email" value="<?php echo $email;?>" />
             <div class="msg"><?php echo $msgEmail; ?></div>
          </div>

          <!--<div class="field-wrap">
            <label>
              Fecha<span class="req">d-m-a</span>
            </label>
            <input type="text" name="edad" autocomplete="off"/>
          </div>-->
            <div class="field-wrap">
            <p> Fecha: </p>
          <input class="date-own" name="edad" style="width: 300px;" type="text" value="<?php echo $edad;?>" readonly="readonly" />
           <div class="msg"><?php echo $msgFecha; ?></div>

  <script type="text/javascript">
      $('.date-own').datepicker({
         viewMode: 'years',
         format: 'yyyy-mm-dd'
       });
  </script>
  <input type="hidden" name="funcion" value="insertar"/>
           </div>
            

          <div class="field-wrap">
          
             <p> Contraseña: </p>
            <input type="password" name="password" value="<?php echo $password;?>" />
             <div class="msg"><?php echo $msgPassword; ?></div>
          </div>

         
          <button type="submit" name="envio" class="button button-block"/>Guardar datos</button>
          
          </form>

       
        
      </div><!-- tab-content -->

      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="../recursos/js/index.js"></script>

</body>
</html>
