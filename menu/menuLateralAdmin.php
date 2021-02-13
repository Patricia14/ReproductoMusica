<?php

# definimos el array de valores para el menu y submenus

$menu=array(

    array(

        'titulo'            => 'Genero',

        'enlace'            => '../navegacion_admin/adminGenero.php',
        
        'subcategoria'      => array()
    
    ),
      
    array(

        'titulo'            => 'Artista',

        'enlace'            => '../navegacion_admin/adminArtista.php',

        'subcategoria'      => array()

    ),

    array(

        'titulo'            => 'Cancion',

        'enlace'            => '../navegacion_admin/adminCancion.php',

        'subcategoria'      => array()

    ),
      array(

        'titulo'            => 'Albumes',

        'enlace'            => '../navegacion_admin/adminAlbum.php',

        'subcategoria'      => array()

    ),
      array(

        'titulo'            => 'Sello',

        'enlace'            => '../navegacion_admin/adminSello.php',

        'subcategoria'      => array()

    ),
      array(

        'titulo'            => 'Privacidad de listas',

        'enlace'            => '../navegacion_admin/adminPrivacidad.php',

        'subcategoria'      => array()

    )





);


$menu2=array(

   array(

        'titulo'            => 'Mantenimiento de Usuarios',

        'enlace'            => '#', # Esta opcion de menu no dispone de enlace

        'subcategoria'      => array(

           
            array(

                'id'        => 'Administradores',

                'titulo'    => 'Administradores',

                'enlace'    => '../navegacion_admin/administrador.php',

            ),
              array(

                'id'        => 'Usuarios',

                'titulo'    => 'Usuarios',

                'enlace'    => '../navegacion_admin/adminUsuario.php',

            ),
              array(

                'id'        => 'privilegio de usuario',

                'titulo'    => 'privilegio de usuario',

                'enlace'    => '../navegacion_admin/adminTipoUsuario.php',

            ),
              

            
        ),

    )

);


/**
 * Funcion para mostrar los enlaces
 * Tiene que recibir el array de valores y la clase a asignar que puede ser:
 *  menu o submenu
 */

function mostrarEnlace($menu,$class)

{

    if($menu['enlace'])

    {

        echo "<a href='".$menu['enlace']."'><span class='glyphicon'></span>";

    }

 

    echo "<li>";

        echo $menu['titulo'];
        echo "</a>";

    echo "</li>";

 

    if($menu['enlace'])

    {

        echo "</a>";

    }

}

function mostrarEnlace2($menu2,$class)
{
    if($menu2['enlace'])

    { 
      echo  "<a href='javascript:;'' data-toggle='collapse' data-target='#demo'><span class='glyphicon'></span>";
    
    }

 echo "<li>";

        echo $menu2['titulo'];
        echo "</a>";

    
   

    if($menu2['enlace'])
    {
        echo "</a>";
    }
}

function mostrarEnlace3($menu2,$class)
{
    if($menu2['enlace'])

    {
      echo "<a href='".$menu2['enlace']."'><span class='glyphicon'></span>";

    }

 echo "<li>";

        echo $menu2['titulo'];
        echo "</a>";

    echo "</li>";


    if($menu2['enlace'])
    {
        echo "</a>";
    }
}




    echo "<nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>";
    echo" <div class='navbar-header'>";
    //Menú responsive
       echo " <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-ex1-collapse\">";
                     echo " <span class=\"sr-only\">Toggle navigation</span>";
                    echo "  <span class=\"icon-bar\"></span>";
                    echo "  <span class=\"icon-bar\"></span>";
                   echo "   <span class=\"icon-bar\"></span>";
                echo "  </button>";
    echo "<a class='navbar-brand' href='../navegacion_admin/adminGenero.php'>Mantenimiento de Reproductor Online</a>";
    echo "</div>";
    echo "<ul class='nav navbar-right top-nav'>";
    echo "  <li class='dropdown'>";

      if (isset($_SESSION['usuario_u'])) {
                       
                        echo "<a href='../conexion/cerrar_conexion.php'><center>".$_SESSION["usuario_u"]."<br>Cerrar sesión </center></a>";
                 }else{
                        header("Location:../inicio/login.php");
                      }
                        echo "</li>";
           echo" </ul>";

           echo "<div class='collapse navbar-collapse navbar-ex1-collapse'>";
             echo   "<ul class='nav navbar-nav side-nav'>";


       # recorremos todo el array de valores

    for($i = 0; $i < count($menu); $i++)
    {

       #echo  "<a href='javascript:;'' data-toggle='collapse' data-target='#demo'>Explorar</a>";
        mostrarEnlace($menu[$i],"menu");
       # echo "<ul id='demo' class='collapse'>";
       # Si dispone de subcategorias, las mostramos

        if(count($menu[$i]["subcategoria"])>0)
            
        {

            for ($j=0;$j<count($menu[$i]["subcategoria"]);$j++)

            {
                
                mostrarEnlace($menu[$i]["subcategoria"][$j], "submenu");
 
            }

        }

    }





    
 for($i = 0; $i < count($menu2); $i++)
    {

        
        mostrarEnlace2($menu2[$i],"menu");
       # echo "<ul id='demo' class='collapse'>";
       # Si dispone de subcategorias, las mostramos

        if(count($menu2[$i]["subcategoria"])>0)
           echo "<ul id='demo' class='collapse'>";
        {

            for ($j=0;$j<count($menu2[$i]["subcategoria"]);$j++)

            {
                
                mostrarEnlace3($menu2[$i]["subcategoria"][$j], "submenu");

            }

        }

    }

   

    echo "</ul>";
    
    echo "</li>";


    echo "</ul>";

echo "</nav>";



?>


