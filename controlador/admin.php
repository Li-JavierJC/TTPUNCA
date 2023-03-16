<?php
      //header("Content-Type: text/html;charset=utf-8");
    $pageTitle = "Administrador TTPUNCA";
    if (!$_SESSION['loggedin']) {
        header('Location:ingresar');
    }

    //Definicion de las Clases
    $bd = new BD();
    $alumno= new Alumno();
    $platillo= new Platillo();
    $usuario= new Usuario();
    $comentario= new Comentario();
    $encuesta= new Encuesta();

    //_______________________________________________________________
    //::::::::::::::::::::::Usuarios:::::::::::::::::::::::::::::::::
    //------------Registro de usuarios en general--------------------
    if(isset($_POST['registrarusuario'])){

        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellidos($_POST['apellidos']);
        $usuario->setSexo($_POST['sexo']);
        $usuario->setEscolaridad($_POST['escolaridad']);
        $usuario->setOcupacion($_POST['ocupacion']);
        $usuario->setDomicilio($_POST['domicilio']);
        $usuario->setEdad($_POST['edad']);
        $usuario->setUsuario($_POST['usuario']);
        $usuario->setContrasena($_POST['contrasena']);
        $usuario->setNivelUsuario($_POST['nivelUsuario']);


        $bd->registrarUsuario($usuario); 
        header('location:admin');
    }

    //-------------Consulta de los usuarios--------------------------
    $listaUsuarios=$bd->consultarUsuarios();

    //------- muentra el total de usuarios 
    $totalUsuario=$bd->totalUsuarios();
    
   

    //--------------Editar usuario-----------------------------------
    if(isset($_POST['editarUsuario'])){

        $usuario->setId($_POST['id']);
        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellidos($_POST['apellidos']);
        $usuario->setSexo($_POST['sexo']);
        $usuario->setEscolaridad($_POST['escolaridad']);
        $usuario->setOcupacion($_POST['ocupacion']);
        $usuario->setDomicilio($_POST['domicilio']);
        $usuario->setEdad($_POST['edad']);
        $usuario->setUsuario($_POST['usuario']);
        $usuario->setContrasena($_POST['contrasena']);

        $bd->editarUsuario($usuario);
        header('location:admin');
    }

    //---------------Eliminar usuario-------------------------------
    if (isset($_REQUEST['idUsuario'])) {
        $bd->eliminarUsuario($_REQUEST['idUsuario']);
        header('location:admin');
    }

     //______________________________________________________________
    //::::::::::::::::::::::Alumnos::::::::::::::::::::::::::::::::::

    //------------------Regitro de los alumnos-----------------------
    if(isset($_POST['registrarse'])){

        $alumno->setNombre($_POST['nombre']);
        $alumno->setApellidos($_POST['apellidos']);
        $alumno->setSexo($_POST['sexo']);
        $alumno->setSemestre($_POST['semestre']);
        $alumno->setCarrera($_POST['carrera']);
        $alumno->setEdad($_POST['edad']);
        $alumno->setUsuario($_POST['usuario']);
        $alumno->setContrasena($_POST['contrasena']);
        $alumno->setNivelUsuario($_POST['nivelUsuario']);

        $bd->registrarAlumno($alumno);
        header('location:admin');
    }


    //---------------------Consulta de los alumnos------------------
    $listaAlumnos=$bd->consultarAlumnos();
    
    //------- muentra el total de Alumnos 
    $totalAlumno=$bd->totalAlumnos();
    
    //--------------Editar Alumno-----------------------------------
    if(isset($_POST['editarAlumn'])){
        echo "llego aqui";
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
        header('location:admin');
    }

    //---------------------Eliminar usuario-------------------------
    if (isset($_REQUEST['idAlumno'])) {
        $bd->eliminarAlumno($_REQUEST['idAlumno']);
        header('location:admin');
    }

     //____________________________________________________________
    //::::::::::::::::::::::Platillos::::::::::::::::::::::::::::::

    //---------------------Registro de platillos------------------
    if(isset($_POST['registrarplatillo'])){
        
        $revisar= getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($revisar !== false) {

           $image= $_FILES['imagen']['tmp_name'];
           $imgContent= addslashes(file_get_contents($image));
    
           $platillo->setNombre($_POST['nombre']);
           $platillo->setIngredientes($_POST['ingredientes']);
           $platillo->setUtencilios($_POST['utencilios']);
           $platillo->setTiempopreparacion($_POST['tiempopreparacion']);
           $platillo->setCaducidad($_POST['caducidad']);
           $platillo->setPorciones($_POST['porciones']);
           $platillo->setEnergia($_POST['energia']);
           $platillo->setCostopromedio($_POST['costopromedio']);
           $platillo->setRendimiento($_POST['rendimiento']);
           $platillo->setProteinas($_POST['proteinas']);
           $platillo->setGrasas($_POST['grasas']);
           $platillo->setHidratoscarbono($_POST['hidratoscarbono']);
           $platillo->setPreparacion($_POST['preparacion']);
           $platillo->setTipocomida($_POST['tipocomida']);
           $platillo->setAutor($_POST['autor']);
           $platillo->setImagen($imgContent);
           $bd->registrarPlatillo($platillo);
            header('location:admin');
        
        }
        
    }

     //--------------Editar Platillo-----------------------------------
    if(isset($_POST['editarPlato'])){

        $tamano=$_FILES['imagen']['size'];
       
        if ($tamano > 0) {

            $platillo->setId($_POST['idPlato']);
            $image= $_FILES['imagen']['tmp_name'];
            $imgContent= addslashes(file_get_contents($image));
            $platillo->setNombre($_POST['nombre']);
            $platillo->setIngredientes($_POST['ingredientes']);
            $platillo->setUtencilios($_POST['utencilios']);
            $platillo->setTiempopreparacion($_POST['tiempopreparacion']);
            $platillo->setCaducidad($_POST['caducidad']);
            $platillo->setPorciones($_POST['porciones']);
            $platillo->setEnergia($_POST['energia']);
            $platillo->setCostopromedio($_POST['costopromedio']);
            $platillo->setRendimiento($_POST['rendimiento']);
            $platillo->setProteinas($_POST['proteinas']);
            $platillo->setGrasas($_POST['grasas']);
            $platillo->setHidratoscarbono($_POST['hidratoscarbono']);
            $platillo->setPreparacion($_POST['preparacion']);
            $platillo->setTipocomida($_POST['tipocomida']);
            $platillo->setAutor($_POST['autor']);
            $platillo->setImagen($imgContent);
            $bd->editarPlatillo($platillo);
            header('location:admin');
        }else{

            $platillo->setId($_POST['idPlato']);
            $platillo->setNombre($_POST['nombre']);
            $platillo->setIngredientes($_POST['ingredientes']);
            $platillo->setUtencilios($_POST['utencilios']);
            $platillo->setTiempopreparacion($_POST['tiempopreparacion']);
            $platillo->setCaducidad($_POST['caducidad']);
            $platillo->setPorciones($_POST['porciones']);
            $platillo->setEnergia($_POST['energia']);
            $platillo->setCostopromedio($_POST['costopromedio']);
            $platillo->setRendimiento($_POST['rendimiento']);
            $platillo->setProteinas($_POST['proteinas']);
            $platillo->setGrasas($_POST['grasas']);
            $platillo->setHidratoscarbono($_POST['hidratoscarbono']);
            $platillo->setPreparacion($_POST['preparacion']);
            $platillo->setTipocomida($_POST['tipocomida']);
            $platillo->setAutor($_POST['autor']);
            //$platillo->setImagen($imgContent);
            $bd->editarPlatilloI($platillo);
            header('location:admin');

        }        
        
    }

    //-----------------consulta de platillos--------------------
     $listaPlatillos=$bd->consultarPlatillos();

    //------- muentra el total de Platilos 
    $totalPlatillo=$bd->totalPlatillos();
    
    //-----------------Eliminar Platillo------------------------
     if (isset($_REQUEST['idPlatillo'])) {
        $bd->eliminarPlatillo($_REQUEST['idPlatillo']);
        header('location:admin');
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
                            confirmButtonText: '<a class="nav-link" href="admin" style="cursor: pointer; color: white">Cerrar Ventana</a>'
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
                            confirmButtonText: '<a class="nav-link" href="admin" style="cursor: pointer; color: white">Cerrar Ventana</a>'
                        })
                    </script>
                </section>
            <?php
        }
    }
     
    //------- muesntra el total de visitantes-------- 
    $totalVisitante=$bd->totalVistantes();

      
    //------- muesntra el total de visitas
    $totalVisita=$bd->totalVistas();

    //------- muentra el total de Alumnos 
    $consultarEncuesta=$bd->consultarEncuesta();
    
    
    //------- muentra el total de visitas por mes
    $totalVisitaAgo=$bd->totalVisitasAgosto();
    $totalVisitaSep=$bd->totalVisitasSeptiembre();
    $totalVisitaOct=$bd->totalVisitasOctubre();
    $totalVisitaNov=$bd->totalVisitasNoviembre();
    $totalVisitaDic=$bd->totalVisitasDiciembre();
    $totalVisitaEne=$bd->totalVisitasEnero();
    $totalVisitaFeb=$bd->totalVisitasFebrero();
    $totalVisitaMar=$bd->totalVisitasMarzo();
    $totalVisitaAbr=$bd->totalVisitasAbril();
    $totalVisitaMay=$bd->totalVisitasMayo();
    $totalVisitaJun=$bd->totalVisitasJunio();
    $totalVisitaJul=$bd->totalVisitasJulio();


    //-----------------Cerrar session del administrador------------------------
    if (isset($_REQUEST['salirAction'])) {
       session_start();
       $_SESSION['loggedin'] = false;
       session_destroy();
       header('location:ingresar');
    }

    
?>