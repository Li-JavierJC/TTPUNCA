<?php
    include "../modelo/BD.php";
    
    $bd = new BD();
    // Verificar si se recibió el ID del platillo desde la solicitud AJAX
    if (isset($_POST['idPlatillo'])) {
        //se obteiene el id del platillo a eliminar 
         $idPlatillo = $_POST['idPlatillo'];
        
        // se envia el id con la funcion,para eliminar el platillo
        $bd->eliminarPlatillo($idPlatillo);
    }
?>
