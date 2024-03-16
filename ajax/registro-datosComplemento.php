<?php
include "../modelo/BD.php";
include "../modelo/complemento.php";

$bd = new BD();
$complemento = new Complemento();

   //---------------------Registro de complementos------------------
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $complemento->setEstado($_POST['estado']);
        $complemento->setRegion($_POST['region']);
        $complemento->setMunicipio($_POST['municipio']);
        $complemento->setLengua($_POST['lengua']);
        $complemento->setCultura($_POST['cultura']);
        $complemento->setIdPlatillo($_POST['idPlatillo']);


        $bd->registrarComplemento($complemento);
        
    }

?>