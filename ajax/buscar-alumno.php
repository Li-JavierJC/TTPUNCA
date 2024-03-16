<?php
    include "../modelo/BD.php";
    include "../modelo/alumno.php";
  
    $bd = new BD();

    if (!empty($_REQUEST['consulta'])) {
        $listaAlumnos = $bd->buscarAlumnos($_REQUEST['consulta']);

        if (count($listaAlumnos) > 0 ) {
            ?>
                <table class="table table-hover table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Número</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Usuario</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="resultadoAlumno">
                        <?php
                            $numero=1;
                            foreach($listaAlumnos as $alumno) { 
                                printf('<tr>');                           
                                    printf('<td>%s</td>', $numero);
                                    printf('<td>%s</td>', $alumno->getNombre());
                                    printf('<td>%s</td>', $alumno->getApellidos());
                                    printf('<td>%s</td>', $alumno->getSexo());
                                    printf('<td>%s</td>', $alumno->getSemestre());
                                    printf('<td>%s</td>', $alumno->getCarrera());
                                    printf('<td>%s</td>', $alumno->getEdad());
                                    printf('<td>%s</td>', $alumno->getUsuario());
                                    printf('<td id="contrasena-a">%s</td>', $alumno->getContrasena());

                                    printf('<td><a class="text-success editAlumno" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#editarAlumno" data-alumnoid="%d"><i class="bi bi-pencil-square"></i></a></td>', $alumno->getId());
                                    
                                    printf('<td><a class="text-danger"  href="Javascript:eliminarAlumno(%d)"><i class="bi bi-trash-fill"></i></a></td>', $alumno->getId());
                                printf('</tr>');
                                $numero++;
                            } 
                        ?>
                    </tbody>
                </table>
                <script>
                    //----------------------------Modificar Alumno----------------------------------------- -->                  
                       $('.editAlumno').on('click', function(){
                            let alumnoId = $(this).data('alumnoid'); // Obtener el ID del alumno del atributo data-alumnoid
                            $('#idAlum').val(alumnoId);
                            
                            let $tr = $(this).closest('tr');
                            let datos = $tr.children("td").map(function(){
                                return $(this).text();
                            }).get();

                            $("#nombre-alumno").val(datos[1]);
                            $("#apellidos-alumno").val(datos[2]);
                            $("#sexo-alumno").val(datos[3]);
                            $("#semestre-alumno").val(datos[4]);
                            $("#carrera-alumno").val(datos[5]);
                            $("#edad-alumno").val(datos[6]);
                            $("#usuario-alumno").val(datos[7]);
                            $("#contrasena-alumno").val(datos[8]);
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