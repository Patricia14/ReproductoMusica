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
$msgEmail= "";
$msgPassword="";
$correo="";
$password="";
if($_POST){
    include("../inicio/verificar.php");
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

      <!--inicio de sesion-->
      <div class="tab-content">
        
             <h1>Reproductor de música</h1>
               <form action="login.php" method="POST">
               <div class="field-wrap">
               <p>Correo electrónico: </p>
                  <input type="email" name="correo" value="<?php echo $correo;?>" />
              <div class="msg"><?php echo $msgEmail; ?></div>
               </div>
          
      <div class="field-wrap">
            <p>Contraseña:</p>
              <input type="password" name="pass" value="<?php echo $password;?>" />
              <div class="msg"><?php echo $msgPassword; ?></div>
      </div>
          <button class="button button-block"/>Aceptar</button>
          </form>
         </div> 
        <!--Registrarse-->
      
        
    <!-- tab-content -->

      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="../recursos/js/index.js"></script>

</body>
</html>
