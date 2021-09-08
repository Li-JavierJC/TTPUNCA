<?php
    $pageTitle = "Registrate";
    
    $bd = new BD();
    $usuario= new Usuario();
    echo "llego";

    if(isset($_POST['registrarse'])){
        echo "entra";

        $usuario->setUsuario($_POST['usuario']);
        $usuario->setContrasena($_POST['contrasena']);

        $bd->registrarUsuario($usuario);
        
        header('Location: primero');
        echo "hola";
        
    } else{
        echo "no entro";
    }
   
    
?>
