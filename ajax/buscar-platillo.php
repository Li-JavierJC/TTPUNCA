<?php
	include "../modelo/BD.php";
    include "../modelo/platillo.php";

    $bd = new BD();

     if (!empty($_REQUEST['consulta'])) {
     	$listaPlatillosAlumnos = $bd->buscarPlatillosAlumnos($_REQUEST['consulta']);

     	if (count($listaPlatillosAlumnos) > 0) {

     		?>
     			<table class="table table-hover table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Número</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                             <th scope="col">Estado de validación</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="resultadoPlatillo">
                        <?php 
                            $numero=1;
                            foreach($listaPlatillosAlumnos as $platillo) { 
                                printf('<tr>');
                                    printf('<td>%s</td>', $numero);    
                                    printf('<td>%s</td>', $platillo->getNombre());
                                    printf('<td>'.'<img src ="data:image/png;base64,'.base64_encode($platillo->getImagen()).'" width="50px" height="50px"/>'.'</td>');
                                    printf('
                                      <td>
                                          <a class="text-primary" href="#" onclick="verModal(%d)" data-bs-toggle="modal" data-bs-target="#verEstado" style="text-decoration: none;">
                                              <article class="container">
                                                  <center>
                                                      <p class="p-1 col-md-6 rounded text-white text-break small" style="background-color:#51CAE3;"><strong>Ver</strong>&nbsp;<i class="bi bi-eye-fill"></i></p>
                                                  </center>
                                              </article>
                                          </a>
                                      </td>
                                    ', $platillo->getId());


                                     printf('<td><a class="btn btn-success text-white p-1 rounded d-inline-flex align-items-center"  href="Javascript:validarPlatilloAlumno(%d)" style="text-decoration:none;">Validar&nbsp;<i class="bi bi-check2-circle"></i></a></td>', $platillo->getId());                           
                                    printf('<td><a class="eliminar-platillo bg-danger text-white p-1 rounded d-inline-flex align-items-center" data-platillo-id="%d" href="#" style="text-decoration: none;">Eliminar&nbsp;<i class="bi bi-trash-fill ml-1"></i></a></td>', $platillo->getId());                                  
                                printf('</tr>');
                                $numero++;
                            } 
                        ?>
                    </tbody>
                </table>
                <!-- Modal -->
                <section class="modal fade" id="verEstado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <section class="modal-dialog modal-dialog-centered ">
                    <section class="modal-content">
                      <section class="modal-header" style="background-color: #09386A; color: white;">
                        <h1 class="modal-title fs-5 w-100 text-center" id="exampleModalLabel">Estados de validación del platillo</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                      </section>
                      <section class="modal-body">
                        <section class="container">
                          <section id="resultadoEstado">
                          </section>
                        </section>
                      </section>
                      <section class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                      </section>
                    </section>
                  </section>
                </section>
                <script>
                    //------- Funcion para mandar el parametro del id de platillo selecionado y mostrar modal
                    function verModal(id) {
                        jQuery.ajax({
                          url: "ajax/estadoValidacion.php", 
                          data: { id: id }, // se pasa el 'id' como parametro al servidor
                          type: "POST",
                          success: function (data) {
                              // Suponiendo que 'data' contiene el contenido modal obtenido del servidor
                              $("#resultadoEstado").html(data);
                              $("#verEstado").modal("show"); // se muestra el modal
                          },
                          error: function () {
                            //se muestra el error en la consola, si es que hay
                            console.error("Error fetching modal content.");
                          },
                        });
                    }
                </script>
     		<?php
     	}else{
     		printf('<article class="container">');
     			print('<div class="alert alert-info" role="alert">No hay coincidencias en su busqueda ): </div>');
     		printf('</article>');
     	}
     }
?>