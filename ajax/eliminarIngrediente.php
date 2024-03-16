<?php
    include "../modelo/BD.php";
    include "../modelo/ingredientes.php";

    $bd = new BD();
    // Verificar si se recibió el ID del ingrediente desde la solicitud AJAX
    if (isset($_POST['idIngrediente']) && !empty($_POST['idIngrediente'])) {
        //se obteiene el id del ingrediente a eliminar 
        $ingredienteId = $_POST['idIngrediente'];
        
        // se envia el id con la funcion,para eliminar el ingredintes
        $bd->eliminarIngrediente($ingredienteId);
    }
?>

