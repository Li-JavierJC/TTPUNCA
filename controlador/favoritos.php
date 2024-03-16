<?php
	$pageTitle = "Platillos Favritos";

	$bd= new BD(); 

	$listaFavoritos=$bd->consultarFavoritos();
	
    //-----------------consulta de platillos--------------------
    $listaPlatillos=$bd->consultarPlatillos();

    if (isset($_REQUEST['idPlatilloMostrar'])) {

        $idPlatilloMostrar = $_REQUEST['idPlatilloMostrar'];
        $_SESSION['idPlatilloMostrar']=$idPlatilloMostrar;

        header('location:informacion-platillo');          
    }

    //-----------------Eliminar Platillo de favoritos----------------
    if (isset($_REQUEST['idFavoritos'])) {
        $bd->eliminarFavoritos($_REQUEST['idFavoritos']);
        header('location:favoritos');
    }
?>