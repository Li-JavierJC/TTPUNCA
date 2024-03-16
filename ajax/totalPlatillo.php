<?php
    include "../modelo/BD.php";
    $bd = new BD();
    //------- muentra el total de Platilos 
    $totalPlatillo=$bd->totalPlatillos();
    echo $totalPlatillo;
?>