<?php
    include "../modelo/BD.php";
    $bd = new BD();

    //------- muentra el total de visitas
    $totalVisita=$bd->totalVistas();
    echo $totalVisita;
?>