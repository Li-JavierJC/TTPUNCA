<?php
    $pageTitle = "Cuenta"; 
  
    $bd= new BD();
    $alumno= new Alumno();
    $platillo= new Platillo();
    $comentario= new Comentario();

 //--------------Editar datos Alumno-----------------------------------
    if(isset($_POST['actualizarDatos'])){
        //echo "llego aqui";
        $alumno->setId($_POST['idalum']);
        $alumno->setNombre($_POST['nombre']);
        $alumno->setApellidos($_POST['apellidos']);
        $alumno->setSexo($_POST['sexo']);
        $alumno->setSemestre($_POST['semestre']);
        $alumno->setCarrera($_POST['carrera']);
        $alumno->setEdad($_POST['edad']);
        $alumno->setUsuario($_POST['usuario']);
        $alumno->setContrasena($_POST['contrasena']);

        $bd->editarAlumno($alumno);         
        $usuario=$alumno->getUsuario();
        //Ingresar como alumno
        $alumno=$bd->obtenerUnAlumno($usuario);
            
        if (!empty($alumno->getId())) {
            $nivelUsuario=$alumno->getNivelUsuario();
            if ($nivelUsuario==2) {

                //se crea la sesion del usuario
                $id=$alumno->getId();
                $nombre=$alumno->getNombre();
                $apellidos=$alumno->getApellidos();
                $sexo=$alumno->getSexo();
                $semestre=$alumno->getSemestre();
                $carrera=$alumno->getCarrera();
                $edad=$alumno->getEdad();
                $usuario=$alumno->getUsuario();
                $contrasena=$alumno->getContrasena();

                $_SESSION['id']=$id;
                $_SESSION['nombre']=$nombre;
                $_SESSION['apellidos']=$apellidos;
                $_SESSION['sexo']=$sexo;
                $_SESSION['semestre']=$semestre;
                $_SESSION['carrera']=$carrera;
                $_SESSION['edad']=$edad;
                $_SESSION['usuario']=$usuario;
                $_SESSION['contrasena']=$contrasena;
                header('location:cuenta');  
            }
        }
    }
    
    /*---------------registro de platillos-----------------------*/
    if(isset($_POST['registrarplatillo'])){
        $revisar= getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($revisar !== false) {
           $image= $_FILES['imagen']['tmp_name'];
           $imgContent= addslashes(file_get_contents($image));
           $platillo->setNombre($_POST['nombre']);
           $platillo->setDescripcion($_POST['descripcion']);
           $platillo->setTiempoPreparacion($_POST['tiempoPreparacion']);
           $platillo->setTiempoCoccion($_POST['tiempoCoccion']);
           $platillo->setCaducidad($_POST['caducidad']);
           $platillo->setPorciones($_POST['porciones']);
           $platillo->setCostoPromedio($_POST['costoPromedio']);
           $platillo->setRendimiento($_POST['rendimiento']);
           $platillo->setTiempoComida($_POST['tiempoComida']);
           $platillo->setAutor($_POST['autor']);
           $platillo->setImagen($imgContent);
           $bd->registrarPlatillo($platillo);
            header('location:cuenta');
        }
    }

     //-----------------consulta de platillos--------------------
     $listaPlatillos=$bd->consultarPlatillos();

    //--------------Editar Platillo-----------------------------------
    if(isset($_POST['editarPlato'])){
        $tamano=$_FILES['imagenn']['size'];
        if ($tamano > 0) {
            $image= $_FILES['imagenn']['tmp_name'];
            $imgContent= addslashes(file_get_contents($image));

            $platillo->setNombre($_POST['nombre']);
            $platillo->setDescripcion($_POST['descripcion']);
            $platillo->setTiempoPreparacion($_POST['tiempoPreparacion']);
            $platillo->setTiempoCoccion($_POST['tiempoCoccion']);
            $platillo->setCaducidad($_POST['caducidad']);
            $platillo->setPorciones($_POST['porciones']);
            $platillo->setCostoPromedio($_POST['costoPromedio']);
            $platillo->setRendimiento($_POST['rendimiento']);
            $platillo->setTiempoComida($_POST['tiempoComida']);
            $platillo->setAutor($_POST['autor']);
            $platillo->setImagen($imgContent);
            $platillo->setId($_POST['idPlato']);
            
            $bd->editarPlatillo($platillo);
            header('location:cuenta');
        }else {

            //$imgContent="";
            $platillo->setId($_POST['idPlato']);
            $platillo->setNombre($_POST['nombre']);
            $platillo->setDescripcion($_POST['descripcion']);
            $platillo->setTiempoPreparacion($_POST['tiempoPreparacion']);
            $platillo->setTiempoCoccion($_POST['tiempoCoccion']);
            $platillo->setCaducidad($_POST['caducidad']);
            $platillo->setPorciones($_POST['porciones']);
            $platillo->setCostoPromedio($_POST['costoPromedio']);
            $platillo->setRendimiento($_POST['rendimiento']);
            $platillo->setTiempoComida($_POST['tiempoComida']);
            $platillo->setAutor($_POST['autor']);
           
            //$platillo->setImagen($imgContent);

            $bd->editarPlatilloI($platillo);
            header('location:cuenta');
        }   
        
    }

    //-----------------Eliminar Platillo------------------------
     if (isset($_REQUEST['idPlatillo'])) {
        $bd->eliminarPlatillo($_REQUEST['idPlatillo']);
        header('location:cuenta');
    }

    //-----------------consulta de comentarios--------------------
    $listaComentarios=$bd->consultarComentarios();

    //-----------------consulta de un comentario--------------------
    if (isset($_REQUEST['idComentario'])) 
    {
        $listaComentario=$bd->consultarComentarioId($_REQUEST['idComentario']);    
        if (empty($listaComentario)) 
        {
           ?>
                <section>
                    <script src="vista/js/sweetalert2.all.min.js"></script>
                    <script src="vista/js/jquery-3.6.0.min.js"></script>
                    <script>
                        Swal.fire({
                            icon: 'info',
                            title: 'Aún no hay cometarios sobre el platillo',
                            confirmButtonText: '<a class="nav-link" href="cuenta" style="cursor: pointer; color: white">Cerrar Ventana</a>'
                        })
                    </script>
                </section>    
            <?php       
        }
        else
        {             
            ?>
                <section>
                    <script src="vista/js/sweetalert2.all.min.js"></script>
                    <script src="vista/js/jquery-3.6.0.min.js"></script>
                    <script>
                        Swal.fire({
                            title:'<?php 
                                foreach($listaComentario as $comentario){
                                    $idPlatillo= $comentario->getIdPlatillo();
                                    foreach($listaPlatillos as $platillo) {
                                        if($idPlatillo==$platillo->getId()){
                                            $nombrePatillo=$platillo->getNombre();
                                        }
                                    }
                                } 
                                printf('<article class="row p-2" style="background-color: #ffcdb9; color:white;">');
                                    printf('<h5 class="col-md-10" style="font-weight:bold;">Comentarios del platillo: %s</h5>', $nombrePatillo);
                                printf('</article>');
                                foreach($listaComentario as $comentario){
                                    printf('<section class="col-md-12 p-1" style="background-color: #99EEE2;" ></section>');
                                    printf('<section class="row">');
                                      printf('<article class="col-md-1">');
                                            printf('<i class="bi bi-person-fill" style="color: #FEB00A;"></i>');
                                        printf('</article>');
                                        printf('<article class="row col-md-9">');
                                            printf('<article class="col-md-5">');
                                                 printf('<h6 class="card-title" style="color: #22636D;">%s</h6>', $comentario->getNombre());
                                            printf('</article>');
                                            printf('<article class="col-md-4">');
                                                printf('<h6 class="card-title" style="color: #22636D;">%s</h6>', $comentario->getFecha());
                                            printf('</article>');
                                        printf('</article>');
                                        printf('<article class="col-md-2 p-3">');
                                            printf('<center><h6 class="card-title" style="color: #22636D;">Puntuación</h6></center>');
                                            switch ($comentario->getCalificacion()) {
                                                case 0:
                                                    printf('<center><label style="color: #D6DBDF; font-size:28px;">★★★★★</label></center>');
                                                    break;
                                                case 1:
                                                    printf('<center><label style="color: orange; font-size: 28px;">★</label><label style="color: #D6DBDF; font-size:28px;">★★★★</label></center>');
                                                    break;
                                                case 2:
                                                    printf('<center><label style="color: orange; font-size: 28px;">★★</label><label style="color: #D6DBDF; font-size:28px;">★★★</label></center>');
                                                    break;
                                                case 3:
                                                    printf('<center><label style="color: orange; font-size: 28px;">★★★</label><label style="color: #D6DBDF; font-size:28px;">★★</label></center>');
                                                    break;
                                                case 4:
                                                    printf('<center><label style="color: orange; font-size: 28px;">★★★★</label><label style="color: #D6DBDF; font-size:28px;">★</label></center>');
                                                    break;
                                                case 5:
                                                    printf('<center><label style="color: orange; font-size: 28px;">★★★★★</label></center>');
                                                    break;
                                            }
                                        printf('</article>');
                                    printf('</section>');
                                    printf('<section class="row">');
                                        printf('<article class="col-md-6">');
                                            printf('<h6>Comentario:</h6><h6 class="card-title" style="color: #22636D;">%s</h6>', $comentario->getComentario());
                                        printf('</article>');
                                        printf('<article class="col-md-4">');
                                            if(empty($comentario->getCocinado())){}
                                            else{
                                                printf('<center><h6 class="card-title" style="color: #22636D;">%s</h6></center>', $comentario->getCocinado());
                                            }
                                        printf('</article>');
                                        printf('<article class="col-md-2">');
                                             if(empty($comentario->getFoto())){}
                                                else{
                                                    printf('<center><h6>Foto de lo que cociné</h6>'.'<img class="card-img-top" src ="data:image/png;base64,'.base64_encode($comentario->getFoto()).'" width="60px" height="100px"/>'.'</center> ');
                                                } 
                                        printf('</article>');
                                    printf('</section>');
                                }
                            ?>', 
                            width: '1000px',
                            confirmButtonText: '<a class="nav-link" href="cuenta" style="cursor: pointer; color: white">Cerrar Ventana</a>'
                        })        
                </script>
            <?php

        }
    }


    //-----------------Cerrar session del alumno------------------------
    if (isset($_REQUEST['salirAction'])) {
       session_start();
       $_SESSION['loggedin'] = false;
       session_destroy();
       header('location:ingresar');
    }

?>