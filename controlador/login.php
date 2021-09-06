<?php
    $pageTitle = "Ingresa o Registrate";

    $bd = new BD();
    $usuario= new Usuario();
   
    if(isset($_POST['iniciar'])){
        
        $usuario=$bd->obtenerusuario($_POST['usuario'],$_POST['contrasena']);
        
        //si el id del objeto retornado no  es null, se encuentra un registro en la base de datos
        if($usuario->getId()!=NULL){
            
            //se crea la sesion del usuario
            $_SESSION['usuario']=$usuario;

            //se envia a la pagina de inicio con su cuenta
            header('Location: primero');
        } else{
            echo "Tu apodo o tu código secreto son incorrectos";
        }      
    } 
?>