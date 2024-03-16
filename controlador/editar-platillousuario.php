<?php
    $pageTitle = "Actualizar platillo";
    $bd= new BD();
    
    //Esta linea trae el id del platillo seleccionado por el usuario
    $idPlatilloEditar=$_SESSION['idPlatilloEditar'];

    //Se realiza la consulta para traer todos los datos del platillo
    $platillo=$bd->mostrarPlatillo($idPlatilloEditar);

    //Se obtiene el id del platillo para realizar la consulta de los ingredientes que corresponde
    $idPlatillo=$platillo->getId();
    //$_SESSION['id']=$idPlatillo;

    //se realiza la consulta de los ingredientes
    $listaIngredientes=$bd->mostrarIngredintes($idPlatillo);

    //se realiza la consulta de preparacion del platillo
    $listaPreparacion=$bd->mostrarPreparacion($idPlatillo);

    //se realiza la cosulta de utencilio
    $listaUtencilio=$bd->mostrarUtencilio($idPlatillo);

    //se realiza la consulta de complemento
    $complemento=$bd->mostrarComplemento($idPlatillo);

    //se realiza la consulta de la validacion de las secciones del platillo
    $validacion=$bd->mostrarValidacion($idPlatillo); 
    
    
?>