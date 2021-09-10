<?php
    $pageTitle = "Registrate";
    
    $bd = new BD();
    $usuario= new Usuario();
    $sesion = new Sesion();
    

    if(isset($_POST['registrarse'])){
        //echo "entra";

        $usuario->setUsuario($_POST['usuario']);
        $usuario->setContrasena($_POST['contrasena']);

        if($bd->buscarUsuario($_POST['usuario'])){
            $bd->registrarUsuario($usuario);
            $sesion->init(); 
            $_SESSION['usuario']=$_POST['usuario'];
            header('Location: primero');
        }
        else{
                     
            ?>
                <section>
                    <script src="vista/js/sweetalert2.all.min.js"></script>
                    <script src="vista/js/jquery-3.6.0.min.js"></script>
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: '¡El apodo ya existe!',
                        text: '¡Elige otro!',
                        })
                    </script>
                </section>    
            <?php

            
        }
        
    } else{
       // echo "no entro";
    }
   
    
?>
