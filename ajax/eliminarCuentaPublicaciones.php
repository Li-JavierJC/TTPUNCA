<?php
    include "../modelo/BD.php";
   
    $bd = new BD();
    //Funcion para eliminar la cuenta del usuario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idUsuario = $_POST['idUsuario'];        
        // Lógica para eliminar solo la cuenta
        $bd->eliminarCuentaPublicaciones($idUsuario);
        session_start();
        $_SESSION['loggedin'] = false;
        session_destroy();
        session_cache_limiter('private_no_expire');
    }
?>