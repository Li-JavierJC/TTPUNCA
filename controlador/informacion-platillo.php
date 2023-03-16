<?php

    $pageTitle = "Información del Platillo";
   
    $bd= new BD();
    $comentario= new Comentario();

    
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
