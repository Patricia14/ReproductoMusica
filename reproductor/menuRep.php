<?php

# definimos el array de valores para el menu y submenus

$menu=array(

    array(

        'titulo'            => 'Busqueda',

        'enlace'            => '../navegacion_usuario/busqueda.php',
        
        'subcategoria'      => array()
    
    ),
      
    array(

        'titulo'            => 'Preguntas Frecuentes',

        'enlace'            => '../navegacion_usuario/preguntas.php',

        'subcategoria'      => array()

    ),

    array(

        'titulo'            => 'Contactanos',

        'enlace'            => '../navegacion_usuario/contacto.php',

        'subcategoria'      => array()

    ),
      array(

        'titulo'            => 'creadores',

        'enlace'            => '../navegacion_usuario/Creadores.php',

        'subcategoria'      => array()

    )

);


$menu2=array(

   array(

        'titulo'            => 'Usuario',

        'enlace'            => '#', # Esta opcion de menu no dispone de enlace

        'subcategoria'      => array(

            array(

                'id'        => 'lista',

                'titulo'    => 'Listas de Reproduccion',

                'enlace'    => '../navegacion_usuario/listarep.php',

            ),

             array(

        'titulo'            => 'Escuchar Musica',

        'enlace'            => '#',

        'subcategoria'      => array()

    ),

            array(

                'id'        => 'canciones',

                'titulo'    => 'Canciones',

                'enlace'    => '../navegacion_usuario/canciones.php',

            ),
              array(

                'id'        => 'perfil',

                'titulo'    => 'Perfil',

                'enlace'    => '../navegacion_usuario/perfil.php',

            ),


            
        ),

    )

);

$menu3=array(

 array(

        'titulo'            => 'Explorar',

        'enlace'            => '#',

        'subcategoria'      => array(


array(

                'id'        => 'Top10',

                'titulo'    => 'Top',

                'enlace'    => '../navegacion_usuario/top.php',

            ),
array(

                'id'        => 'generos',

                'titulo'    => 'Generos',

                'enlace'    => '../navegacion_usuario/generos.php',

            ),
array(

                'id'        => 'albumes',

                'titulo'    => 'Albumes',

                'enlace'    => '../navegacion_usuario/albumes.php',

            ),
array(

                'id'        => 'artista',

                'titulo'    => 'Artista',

                'enlace'    => '../navegacion_usuario/artista.php',

            ),
),

    ),

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

function mostrarEnlace4($menu3,$class)
{
    if($menu3['enlace'])

    {

      echo  "<a href='javascript:;'' data-toggle='collapse' data-target='#explo'>";
      
    }

 echo "<li>";

        echo $menu3['titulo'];
        echo "</a>";
   

    if($menu3['enlace'])
    {
        echo "</a>";
    }
}

function mostrarEnlace5($menu3,$class)
{
    if($menu3['enlace'])

    { 
      echo "<a href='".$menu3['enlace']."'><span class='glyphicon'></span>";
 
    }

 echo "<li>";

        echo $menu3['titulo'];
        echo "</a>";

    echo "</li>";


    if($menu3['enlace'])
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
    echo "<a class='navbar-brand' href='busqueda.php'>Reproductor Online</a>";
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
     for($i = 0; $i < count($menu3); $i++)
    {
        mostrarEnlace4($menu3[$i],"menu");
       # echo "<ul id='demo' class='collapse'>";
       # Si dispone de subcategorias, las mostramos

        if(count($menu3[$i]["subcategoria"])>0)
           echo "<ul id='explo' class='collapse'>";
        {

            for ($j=0;$j<count($menu3[$i]["subcategoria"]);$j++)

            {
                
                mostrarEnlace5($menu3[$i]["subcategoria"][$j], "submenu");

            }

        }

    }

    echo "</ul>";

echo "</nav>";



?>


