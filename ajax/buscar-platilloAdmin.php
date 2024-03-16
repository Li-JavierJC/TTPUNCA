<?php
    include "../modelo/BD.php";
    include "../modelo/platillo.php";

    $bd = new BD();

     if (!empty($_REQUEST['consulta'])) {
        $listaPlatillosAdministrador = $bd->buscarPlatillosAdministrador($_REQUEST['consulta']);

        if (count($listaPlatillosAdministrador) > 0) {

            ?>
                <table class="table table-hover table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Número</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="resultadoPlatillo">
                        <?php 
                            $numero=1;
                            foreach($listaPlatillosAdministrador as $platillo) { 
                                printf('<tr>');
                                    printf('<td>%s</td>', $numero);    
                                    printf('<td>%s</td>', $platillo->getNombre());
                                    printf('<td>'.'<img src ="data:image/png;base64,'.base64_encode($platillo->getImagen()).'" width="50px" height="50px"/>'.'</td>');
                                    printf('<td><a class="btn btn-success text-white p-1 rounded d-inline-flex align-items-center"  href="Javascript:editarPlatilloAdministrador(%d)" style="text-decoration:none;">Actualizar&nbsp;<i class="bi bi-arrow-repeat ml-1" ></i></a></td>', $platillo->getId());                           
                                   printf('<td><a class="eliminar-platillo bg-danger text-white p-1 rounded d-inline-flex align-items-center" data-platillo-id="%d" href="#" style="text-decoration: none;">Eliminar&nbsp;<i class="bi bi-trash-fill ml-1"></i></a></td>', $platillo->getId());                                  
                                printf('</tr>');
                                $numero++;
                            } 
                        ?>
                    </tbody>
                </table>
            <?php
        }else{
            printf('<article class="container">');
                print('<div class="alert alert-info" role="alert">No hay coincidencias en su busqueda ): </div>');
            printf('</article>');
        }
     }
?>