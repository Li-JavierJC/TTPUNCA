<?php
    $pageTitle = "Registrate";
    
    
    $bd = new BD();
    $usuario= new Usuario();
   
    if(isset($_POST['registrarse'])){
        
        $usuario->setUsuario($_POST['usuario']);
        $usuario->setContrasena($_POST['contrasena']);
    
        $bd->registrarUsuario($usuario);
        
        header('Location: primero');
        
    } 

    
    
?>
