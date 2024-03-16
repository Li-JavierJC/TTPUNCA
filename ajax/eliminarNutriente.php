<?php
    include "../modelo/BD.php";
    include "../modelo/nutriente.php";

    $bd = new BD();
    // Verificar si se recibió el ID del nutriente desde la solicitud AJAX
    if (isset($_POST['idNutriente']) && !empty($_POST['idNutriente'])) {
        //se obteiene el id del nutriente a eliminar 
        $nutrienteId = $_POST['idNutriente'];
        
        // se envia el id con la funcion,para eliminar el nutriente
        $bd->eliminarNutriente($nutrienteId);
    }
?>
