<?php
    include "../modelo/BD.php";
    $bd = new BD();

    //------- muentra el total de visitantes-------- 
    $totalVisitante=$bd->totalVistantes();
    echo $totalVisitante;
?>