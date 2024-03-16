<?php

    $pageTitle = "Información del Platillo"; 
   
    $bd= new BD();
    $comentario= new Comentario();
    $platillo= new Platillo();
    $ingredientes = new Ingredientes();

    //Esta linea trae el id del platillo seleccionado por el usuario
    $idPlatilloMostrar=$_SESSION['idPlatilloMostrar'];

    //Se realiza la consulta para traer todos los datos del platillo
    $platillo=$bd->mostrarPlatillo($idPlatilloMostrar);

    //Se obtiene el id del platillo para realizar la consulta de los ingredientes que corresponde
    $idPlatillo=$platillo->getId();
    $_SESSION['id']=$idPlatillo;

    //se realiza la consulta de la validacion de las secciones del platillo
    $validacion=$bd->mostrarValidacion($idPlatillo); 

    //se realiza la consulta de los ingredientes
    $listaIngredintes=$bd->mostrarIngredintes($idPlatillo);

    //se realiza la consulta de preparacion del platillo
    $listaPreparacion=$bd->mostrarPreparacion($idPlatillo);

    //se realiza la cosulta de utencilio
    $listaUtencilio=$bd->mostrarUtencilio($idPlatillo);

    //se realiza la cosulta de nutriente
    $listaNutriente=$bd->mostrarNutriente($idPlatillo);

    //se realiza la consulta de complemento
    $complemento=$bd->mostrarComplemento($idPlatilloMostrar);


    //registro de cometarios a los platillos
    if(isset($_POST['registrarComentario'])){
        if (!empty($_POST["usuario"])) {
            
            $tamano=$_FILES['imagen']['size'];
            if ($tamano > 0) {
                $image= $_FILES['imagen']['tmp_name'];
                $imgContent= addslashes(file_get_contents($image));
               
                $comentario->setNombre($_POST['nombre']);
                $comentario->setComentario($_POST['comentario']);
                $comentario->setCalificacion($_POST['calificacion']);
                $comentario->setCocinado($_POST['cocinado']);
                $comentario->setFoto($imgContent);
                $comentario->setFecha($_POST['fecha']);
                $comentario->setIdPlatillo($_POST['idPlatillo']);
                $comentario->setIdUsuario($_POST['idUsuario']);
                    
                $bd->registrarComentario($comentario);
                header('location:informacion-platillo');
            }else{

                $imgContent="";
                $comentario->setNombre($_POST['nombre']);
                $comentario->setComentario($_POST['comentario']);
                $comentario->setCalificacion($_POST['calificacion']);
                $comentario->setCocinado($_POST['cocinado']);
                $comentario->setFoto($imgContent);
                $comentario->setFecha($_POST['fecha']);
                $comentario->setIdPlatillo($_POST['idPlatillo']);
                $comentario->setIdUsuario($_POST['idUsuario']);
            
                $bd->registrarComentarioSF($comentario);
                header('location:informacion-platillo');

            }
              
        }else{
            ?>
                <section>
                    <script src="vista/js/sweetalert2.all.min.js"></script>
                    <script src="vista/js/jquery-3.6.0.min.js"></script>
                    <script>
                        Swal.fire({
                            icon: 'info',
                            title: 'Registrate o inicie sesion para comentar',
                            text:'O comente como invitado',                            
                        })
                    </script>
                </section>    
            <?php
        }
    }

    //registro de comentario como invitado
    if(isset($_POST['comentarioInvitado'])){
        
        $tamano=$_FILES['imagen']['size'];
        if ($tamano > 0) {
                $image= $_FILES['imagen']['tmp_name'];
                $imgContent= addslashes(file_get_contents($image));
                
                $idUsuario=0;
                $comentario->setNombre($_POST['nombre']);
                $comentario->setComentario($_POST['comentario']);
                $comentario->setCalificacion($_POST['calificacion']);
                $comentario->setCocinado($_POST['cocinado']);
                $comentario->setFoto($imgContent);
                $comentario->setFecha($_POST['fecha']);
                $comentario->setIdPlatillo($_POST['idPlatillo']);
                $comentario->setIdUsuario($idUsuario);
                    
                $bd->registrarComentario($comentario);
                header('location:informacion-platillo');
            }else{

                $imgContent="";
                $idUsuario=0;
                $comentario->setNombre($_POST['nombre']);
                $comentario->setComentario($_POST['comentario']);
                $comentario->setCalificacion($_POST['calificacion']);
                $comentario->setCocinado($_POST['cocinado']);
                $comentario->setFoto($imgContent);
                $comentario->setFecha($_POST['fecha']);
                $comentario->setIdPlatillo($_POST['idPlatillo']);
                $comentario->setIdUsuario($idUsuario);
            
                $bd->registrarComentarioSF($comentario);
                header('location:informacion-platillo');

            }
    }

    //-----------------consulta de comentarios--------------------
    $listaComentarios=$bd->consultarComentarios();
    //-----------------consulta de favoritos-------------------
    $listaFavoritos=$bd->consultarFavoritos();
    

?>
