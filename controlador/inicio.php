<?php
    $pageTitle = "Transferencia de Tecnología de Platillos";
   
    //Definicion de las Clases
    $bd = new BD();
    $encuesta= new Encuesta();
    
    $ip= $_SERVER['REMOTE_ADDR'];
    $bd->visitasReales($ip);

    //------- muentra el total de Platilos 
    $totalPlatillo=$bd->totalPlatillos();

    //------- muentra el total de visitantes-------- 
    $totalVisitante=$bd->totalVistantes();

      
    //------- muentra el total de visitas
    $totalVisita=$bd->totalVistas();

    //-------mustra el total de cometarios
    $totalComentario=$bd->totalComentarios();


    //registar encuesta encuesta
    if(isset($_POST['registrarse'])){

        $encuesta->setNombre($_POST['nombre']);
        $encuesta->setSexo($_POST['sexo']);
        $encuesta->setEdad($_POST['edad']);
        $encuesta->setMedio($_POST['medio']);
        $encuesta->setEstado($_POST['estado']);
        $encuesta->setMunicipio($_POST['municipio']);
        $encuesta->setComentario($_POST['comentario']);
        $encuesta->setCalificacion($_POST['calificacion']);
        $encuesta->setFecha($_POST['fecha']);

        $bd->registrarEncuesta($encuesta);
        header('location:inicio');

    }
?>