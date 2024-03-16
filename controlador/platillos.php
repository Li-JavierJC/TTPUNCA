<?php
    $pageTitle = "Platillos en PCT-OAXACA";
   
    //Definicion de las Clases
    $bd = new BD();


    //-----------------consulta de platillos--------------------
    $listaPlatillos=$bd->consultarPlatillos();

    if (isset($_REQUEST['idPlatilloMostrar'])) {

        $idPlatilloMostrar = $_REQUEST['idPlatilloMostrar'];
        $_SESSION['idPlatilloMostrar']=$idPlatilloMostrar;

        header('location:informacion-platillo');          
    }

?>