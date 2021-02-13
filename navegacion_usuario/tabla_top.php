<?php
       require ("../conexion/management.php");
      $obj = new management();
      $datos=$obj->consulta("SELECT * FROM cancion inner join album on album.id_Album=cancion.album_Cancion inner join artista on artista.id_artista=album.id_artista ORDER BY count_Cancion DESC LIMIT 10");

       ?>

		<table class="table table-bordered">
                          <tr>
                            <td><h3>Cancion</h3></td>
                            <td><h3>Artista </h3></td>
                            <td><h3>Reproducciones</h3> </td>
                          </tr>
                          <?php foreach ($datos as $fila) {?>
                          <tr>
                          
                            <td><?php echo $fila["titulo_Cancion"]; ?></td>
                            <td><?php echo $fila["nombre_Artista"]; ?></td>
                            <td><?php echo $fila["count_Cancion"]; ?></td>
                            </tr>
                        <?php } ?>
                         </table>