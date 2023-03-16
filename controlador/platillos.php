<?php
    $pageTitle = "Platillos";
   
    //Definicion de las Clases
    $bd = new BD();
    $platillo= new Platillo();
    

    //-----------------consulta de platillos--------------------
     $listaPlatillos=$bd->consultarPlatillos();

    $platillos_x_pagina=6;
    //------- muentra el total de Platilos 
    $totalPlatillos=$bd->totalPlatillos();
    
    //se hace la operacion de division de la cantida total de los platillos entre 3 
    $paginas=$totalPlatillos/3;

    // se redondea hacia arriba el resultado de la division 
    $paginas=ceil($paginas);
    //echo $paginas;
    //echo $totalPlatillos;


    if (isset($_REQUEST['idPlatilloMostrar'])) {
        $platillo=$bd->mostrarComida($_REQUEST['idPlatilloMostrar']);


        if ($platillo->getId()!=NULL) {
            $id=$platillo->getId();
            $nombrePlatillo=$platillo->getNombre();
            $ingredientes=$platillo->getIngredientes();
            $utencilios=$platillo->getUtencilios();
            $tiempopreparacion=$platillo->getTiempopreparacion();
            $caducidad=$platillo->getCaducidad();
            $porciones=$platillo->getPorciones();
            $energia=$platillo->getEnergia();
            $costo=$platillo->getCostopromedio();
            $rendimiento=$platillo->getRendimiento();
            $proteinas=$platillo->getProteinas();
            $grasas=$platillo->getGrasas();
            $carbono=$platillo->getHidratoscarbono();
            $preparacion=$platillo->getPreparacion();
            $tipo=$platillo->getTipocomida();
            $autor=$platillo->getAutor();
            $imagen=$platillo->getImagen();

            $_SESSION['id']=$id;
            $_SESSION['nombrePlatillo']=$nombrePlatillo;
            $_SESSION['ingredientes']=$ingredientes;
            $_SESSION['utencilios']=$utencilios;
            $_SESSION['tiempopreparacion']= $tiempopreparacion;
            $_SESSION['caducidad']=$caducidad;
            $_SESSION['porciones']=$porciones;
            $_SESSION['energia']=$energia;
            $_SESSION['costo']=$costo;
            $_SESSION['rendimiento']=$rendimiento;
            $_SESSION['proteinas']=$proteinas;
            $_SESSION['grasas']=$grasas;
            $_SESSION['carbono']=$carbono;
            $_SESSION['preparacion']=$preparacion;
            $_SESSION['tipo']=$tipo;
            $_SESSION['autor']=$autor;
            $_SESSION['imagen']=$imagen;

            header('location:informacion-platillo');          
        }
       
    }

?>