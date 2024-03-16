<?php
    include "../modelo/BD.php";
    include "../modelo/utencilio.php";

    $bd = new BD();
    // Verificar si se recibió el ID del utencilio desde la solicitud AJAX
    if (isset($_POST['idUtencilio']) && !empty($_POST['idUtencilio'])) {
        //se obteiene el id del utencilio a eliminar 
        $utencilioId = $_POST['idUtencilio'];
        
        // se envia el id con la funcion,para eliminar el utencilio
        $bd->eliminarUtencilio($utencilioId);
    }
?>
