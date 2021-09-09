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
            //echo '<script language="javascript">alert("El Apodo ya existe, elige otro apodo");</script>';
            
            ?>
            <h2  class="usuarioExiste">¡El apodo ya existe, elige otro!</h2>
                    
            <?php

            
        }
        
    } else{
       // echo "no entro";
    }
   
    
?>
