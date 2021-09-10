<?php
    $pageTitle = "Ingresa o Registrate";

    $bd = new BD();
    $usuario= new Usuario();
    $sesion = new Sesion();
   
    if(isset($_POST['iniciar'])){
        
        $usuario=$bd->obtenerusuario($_POST['usuario'],$_POST['contrasena']);

     
      
        //si el id del objeto retornado no  es null, se encuentra un registro en la base de datos
        if($usuario->getId()!=NULL){
            $sesion->init();           
            //se crea la sesion del usuario
            $_SESSION['usuario']=$_POST['usuario'];
        
            //se envia a la pagina de inicio con su cuenta
            header('Location: primero');
        } else{
            ?>
                <section>
                    <script src="vista/js/sweetalert2.all.min.js"></script>
                    <script src="vista/js/jquery-3.6.0.min.js"></script>
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: '¡Tu apodo o tu código es incorrecto!',
                        text: '¡Intentalo nuevamente!',
                
                        })
                    </script>
                </section>
            <?php
            
        }      
    } 
?>