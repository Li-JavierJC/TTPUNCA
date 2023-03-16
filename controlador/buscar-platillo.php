<?php
	include "../modelo/BD.php";
    include "../modelo/platillo.php";

    $bd = new BD();

     if (!empty($_REQUEST['consulta'])) {
     	$listaPlatillos = $bd->buscarPlatillos($_REQUEST['consulta']);

     	if (count($listaPlatillos) > 0) {

     		?>
     			<table class="table table-hover table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Número</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo Comida</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Comentarios</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="resultadoPlatillo">
                        <?php 
                            $numero=1;
                            foreach($listaPlatillos as $platillo) { 
                                printf('<tr>');
                                    printf('<td>%s</td>', $numero);    
                                    printf('<td>%s</td>', $platillo->getNombre());
                                    printf('<td>%s</td>', $platillo->getTipocomida());
                                    printf('<td id="ingredientes-m">%s</td>', $platillo->getIngredientes());
                                    printf('<td id="utencilios-m">%s</td>', $platillo->getUtencilios());
                                    printf('<td id="tiempopreparacion-m">%s</td>', $platillo->getTiempopreparacion());
                                    printf('<td id="caducidad-m">%s</td>', $platillo->getCaducidad());
                                    printf('<td id="porciones-m">%s</td>', $platillo->getPorciones());
                                    printf('<td id="energia-m">%s</td>', $platillo->getEnergia());
                                    printf('<td id="costopromedio-m">%s</td>', $platillo->getCostopromedio());
                                    printf('<td id="rendimiento-m">%s</td>', $platillo->getRendimiento());
                                    printf('<td id="proteinas-m">%s</td>', $platillo->getProteinas());
                                    printf('<td id="grasas-m">%s</td>', $platillo->getGrasas());
                                    printf('<td id="hidratoscarbono-m">%s</td>', $platillo->getHidratoscarbono());
                                    printf('<td id="preparacion-m">%s</td>', $platillo->getPreparacion());         

                                    printf('<td>%s</td>', $platillo->getAutor());
                                    printf('<td>'.'<img src ="data:image/png;base64,'.base64_encode($platillo->getImagen()).'" width="50px" height="50px"/>'.'</td>');
                                    printf('<td><a class="text-primary" href="Javascript:comentarioPlatillo(%d)"><i class="bi bi-chat-left-dots-fill"></i></a></td>', $platillo->getId()); 
                                    printf('<td><a class="text-success editPlatillo"  style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#editarPlatillo"><i class="bi bi-pencil-square"></i></a></td>');                          
                                    printf('<td><a class="text-danger"  href="Javascript:eliminarPlatillo(%d)"><i class="bi bi-trash-fill"></i></a></td>', $platillo->getId());                                  
                                printf('</tr>');
                                $numero++;
                            } 
                        ?>
                    </tbody>
                </table>

                <script>
                	//----------------------------Modificar Platillo----------------------------------------- -->
				    $('.editPlatillo').on('click', function(){
				        $tr=$(this).closest('tr');
				        var datos=$tr.children("td").map(function(){
				            return $(this).text();
				        });
				        $('#idPlato').val(datos[0]);
				        $("#nombre-platillo").val(datos[1]);
				        $("#tipocomida-platillo").val(datos[2]);
				        $("#ingredientes-platillo").val(datos[3]);
				        $("#utencilios-platillo").val(datos[4]);
				        $("#tiempopreparacion-platillo").val(datos[5]);
				        $("#caducidad-platillo").val(datos[6]);
				        $("#porciones-platillo").val(datos[7]);
				        $("#energia-plarillo").val(datos[8]);
				        $("#costopromedio-platillo").val(datos[9]);
				        $("#rendimiento-platillo").val(datos[10]);
				        $("#proteinas-platillo").val(datos[11]);
				        $("#grasas-platillo").val(datos[12]);
				        $("#hidratoscarbon-platillo").val(datos[13]);
				        $("#preparacion-platillo").val(datos[14]);
				        
				        $("#autor-platillo").val(datos[15]);
				        //$("#imagen-platillo").val(datos[16]);

				    });
                </script>
     		<?php
     	}else{
     		printf('<article class="container">');
     			print('<div class="alert alert-info" role="alert">No hay coincidencias en su busqueda ): </div>');
     		printf('</article>');
     	}
     }
?>