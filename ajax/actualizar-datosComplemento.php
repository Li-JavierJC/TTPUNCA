<?php
    include "../modelo/BD.php";
    include "../modelo/complemento.php";

    $bd = new BD();
    $complemento = new Complemento();

    // Verificar que se recibieron los datos mediante una solicitud POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $complemento->setId($_POST['idComplemento']);
        $complemento->setEstado($_POST['estado']);
        $complemento->setRegion($_POST['region']);
        $complemento->setMunicipio($_POST['municipio']);
        $complemento->setLengua($_POST['lengua']);
        $complemento->setCultura($_POST['cultura']);
        $complemento->setIdPlatillo($_POST['idPlatillo']);


        $bd->actualizarComplemento($complemento);
        
    }
?>
