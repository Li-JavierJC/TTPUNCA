<?php
    include "../modelo/BD.php";
    include "../modelo/platillo.php";
    
    $bd = new BD();

    if (!empty($_REQUEST['consulta'])) {
        $listaPlatillos = $bd->buscarPlatillos($_REQUEST['consulta']);
        if (count($listaPlatillos) > 0) {
            ?> 
            <section class="container p-2">
                <section class="row align-items-start">
                  <?php 
                    foreach($listaPlatillos as $platillo){             
                        printf('<section class="col-md-4">');
                            printf('<a id="imagen-platillo" href="Javascript:mostrarPlatillos(%d)"><img class="card-img-top img-responsive" src ="data:image/png;base64,'.base64_encode($platillo->getImagen()).'" width="290px" height="250px"/></a>', $platillo->getId()); 
                            printf('<article id="pie-imagen" class="card-body">');
                               printf('<h5 class="card-title">%s</h5>', $platillo->getNombre());
                               printf('<a  class="btn btn-primary"  href="Javascript:mostrarPlatillos(%d)">Saber más...</a>', $platillo->getId());
                            printf('</article>');
                            printf('<span class="p-2"></span>');
                        printf('</section>');                       
                    } 
                  ?>
                </section>
            </section>
            <?php
        }else{
            printf('<article class="container">');
                print('<div class="alert alert-info" role="alert">No hay coincidencias en su busqueda ): </div>');
            printf('</article>');
        }
    }
?>