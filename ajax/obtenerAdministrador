<?php
    include "../modelo/BD.php";
    include "../modelo/validacion.php";

    $bd= new BD();
    $validacion= new Validacion();
    // Verifica si se ha recibido el parámetro 'id' a través de POST
    if (isset($_POST['id'])) {
        // Recupera el valor del 'id' enviado desde JavaScript
        $id = $_POST['id'];

        //se realiza la consulta de la validacion de las secciones del platillo
        $validacion=$bd->mostrarValidacion($id);

        ?>
            <section>
                <section class="table-responsive">
                  <table class="table ">
                    <thead style="background-color:#900C3F; color: white;">
                      <tr>
                        <th>Secciones</th>
                        <th>Estado de validación</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Datos del platillo</td>
                        <td>
                          <article>
                            <center>
                              <?php
                                $dato = $validacion->getSeccionDatos();

                                switch ($dato) {
                                  case 1:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#51CAE3;">%s<i class="bi bi-hourglass-split"></i></p>', 'En proceso');
                                    break;
                                  case 2:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#FFC300;">%s<i class="bi bi-clipboard2-pulse-fill"></i></p>', 'En revisión');
                                    break;
                                  case 3:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#FF5733;">%s<i class="bi bi-pencil-fill"></i></p>', 'Modificar');
                                    break;
                                    break;
                                  case 4:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#2FE90A;">%s<i class="bi bi-check2-circle"></i></p>', 'Publicado');
                                    break;
                                  default:
                                    // Código para cuando $dato no coincide con ninguno de los casos anteriores
                                    break;
                                }
                              ?>
                            </center>
                          </article>
                        </td>
                      </tr>
                      <tr>
                        <td>Ingredientes</td>
                        <td>
                          <article>
                            <center>
                              <?php
                                $dato = $validacion->getSeccionIngredientes();

                                switch ($dato) {
                                  case 1:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#51CAE3;">%s<i class="bi bi-hourglass-split"></i></p>', 'En proceso');
                                    break;
                                  case 2:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#FFC300;">%s<i class="bi bi-clipboard2-pulse-fill"></i></p>', 'En revisión');
                                    break;
                                  case 3:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#FF5733;">%s<i class="bi bi-pencil-fill"></i></p>', 'Modificar');
                                    break;
                                    break;
                                  case 4:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#2FE90A;">%s<i class="bi bi-check2-circle"></i></p>', 'Publicado');
                                    break;
                                  default:
                                    // Código para cuando $dato no coincide con ninguno de los casos anteriores
                                    break;
                                }
                              ?>
                            </center>
                          </article>
                        </td>
                      </tr>
                      <tr>
                        <td>Utencilios</td>
                        <td>
                          <article>
                            <center>
                              <?php
                                $dato = $validacion->getSeccionUtencilio();

                                switch ($dato) {
                                  case 1:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#51CAE3;">%s<i class="bi bi-hourglass-split"></i></p>', 'En proceso');
                                    break;
                                  case 2:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#FFC300;">%s<i class="bi bi-clipboard2-pulse-fill"></i></p>', 'En revisión');
                                    break;
                                  case 3:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#FF5733;">%s<i class="bi bi-pencil-fill"></i></p>', 'Modificar');
                                    break;
                                    break;
                                  case 4:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#2FE90A;">%s<i class="bi bi-check2-circle"></i></p>', 'Publicado');
                                    break;
                                  default:
                                    // Código para cuando $dato no coincide con ninguno de los casos anteriores
                                    break;
                                }
                              ?>
                            </center>
                          </article>
                        </td>
                      </tr>
                      <tr>
                        <td>Preparación</td>
                        <td>
                          <article>
                            <center>
                              <?php
                                $dato = $validacion->getSeccionPreparacion();

                                switch ($dato) {
                                  case 1:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#51CAE3;">%s<i class="bi bi-hourglass-split"></i></p>', 'En proceso');
                                    break;
                                  case 2:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#FFC300;">%s<i class="bi bi-clipboard2-pulse-fill"></i></p>', 'En revisión');
                                    break;
                                  case 3:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#FF5733;">%s<i class="bi bi-pencil-fill"></i></p>', 'Modificar');
                                    break;
                                    break;
                                  case 4:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#2FE90A;">%s<i class="bi bi-check2-circle"></i></p>', 'Publicado');
                                    break;
                                  default:
                                    // Código para cuando $dato no coincide con ninguno de los casos anteriores
                                    break;
                                }
                              ?>
                            </center>
                          </article>
                        </td>
                      </tr>
                      <tr>
                        <td>Información Adicional</td>
                        <td>
                          <article>
                            <center>
                              <?php
                                $dato = $validacion->getSeccionComplemento();

                                switch ($dato) {
                                  case 1:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#51CAE3;">%s<i class="bi bi-hourglass-split"></i></p>', 'En proceso');
                                    break;
                                  case 2:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#FFC300;">%s<i class="bi bi-clipboard2-pulse-fill"></i></p>', 'En revisión');
                                    break;
                                  case 3:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#FF5733;">%s<i class="bi bi-pencil-fill"></i></p>', 'Modificar');
                                    break;
                                    break;
                                  case 4:
                                    printf('<p class="col-md-6 rounded text-white text-break small" style="background-color:#2FE90A;">%s<i class="bi bi-check2-circle"></i></p>', 'Publicado');
                                    break;
                                  default:
                                    // Código para cuando $dato no coincide con ninguno de los casos anteriores
                                    break;
                                }
                              ?>
                            </center>
                          </article>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </section>
                <section>
                  <h6><strong>Nota:</strong></h6>
                  <section class="border border-secondary border-2 rounded-2">
                    <?php
                      $nota = $validacion->getNota();
                      if (empty($nota)) {
                        printf('<p>¡No hay nota!</p>');
                      } else {
                        printf('<p>%s</p>', $nota);
                      }
                    ?>
                  </section>
                </section>
              </section>
        <?php
    }
?>
