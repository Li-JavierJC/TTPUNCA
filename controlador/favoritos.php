<?php
	$pageTitle = "Platillos Favritos";

	$bd= new BD();
	$favoritos= new Favoritos();
	$usuario= new Usuario();
	$platillo= new Platillo();

	$listaFavoritos=$bd->consultarFavoritos();
	//-----------------consulta de platillos--------------------
    $listaPlatillos=$bd->consultarPlatillos();

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
    //-----------------Eliminar Platillo de favoritos----------------
    if (isset($_REQUEST['idFavoritos'])) {
        $bd->eliminarFavoritos($_REQUEST['idFavoritos']);
        header('location:favoritos');
    }
?>