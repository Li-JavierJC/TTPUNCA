<?php
    include "../modelo/BD.php";
    include "../modelo/usuario.php";
  
    $bd = new BD();

    if (!empty($_REQUEST['consulta'])) {
        $listaUsuarios = $bd->buscarUsuarios($_REQUEST['consulta']);
        if (count($listaUsuarios) > 0 ) {
            ?>
               <table id="myTabl" class="table table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Número</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Escolaridad</th>
                            <th scope="col">Ocupación</th>
                            <th scope="col">Domicilio</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Usuario</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $numero=1;
                            foreach($listaUsuarios as $usuario) { 
                                printf('<tr>');
                                    printf('<td>%s</td>', $numero);    
                                    printf('<td>%s</td>', $usuario->getNombre());
                                    printf('<td>%s</td>', $usuario->getApellidos());
                                    printf('<td>%s</td>', $usuario->getSexo());
                                    printf('<td>%s</td>', $usuario->getEscolaridad());
                                    printf('<td>%s</td>', $usuario->getOcupacion());
                                    printf('<td>%s</td>', $usuario->getDomicilio());
                                    printf('<td>%s</td>', $usuario->getEdad());
                                    printf('<td>%s</td>', $usuario->getUsuario());
                                    printf('<td id="contrasena-g">%s</td>', $usuario->getContrasena());
                                    
                                    printf('<td><a class="text-success editbtn" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#editarUsuario" data-userid="%d"><i class="bi bi-pencil-square"></i></a></td>', $usuario->getId());

                                    printf('<td><a  class="text-danger" href="Javascript:eliminarUsuario(%d)"><i class="bi bi-trash-fill"></i></a></td>', $usuario->getId());
                                printf('</tr>');
                                $numero++;
                            } 
                        ?>
                    </tbody>
                </table>
                <script>
                    //----------------------------Modificar usuario-----------------------------------------
                    $('.editbtn').on('click', function(){
                        let userId = $(this).data('userid'); // Obtener el ID del usuario del atributo data-userid
                        $('#idUpdate').val(userId);
                        
                        let $tr = $(this).closest('tr');
                        let datos = $tr.children("td").map(function(){
                            return $(this).text();
                        }).get();

                        $("#nombre").val(datos[1]);
                        $("#apellidos").val(datos[2]);
                        $("#sexo").val(datos[3]);
                        $("#escolaridad").val(datos[4]);
                        $("#ocupacion").val(datos[5]);
                        $("#domicilio").val(datos[6]);
                        $("#edad").val(datos[7]);
                        $("#usuario1").val(datos[8]);
                        $("#contrasena").val(datos[9]);
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