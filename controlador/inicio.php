<?php
    $pageTitle = "Plataforma para la Conservación de Comida Tradicional de Oaxaca.";
   
    //Definicion de las Clases
    $bd = new BD();
    $encuesta= new Encuesta();
    
    $ip= $_SERVER['REMOTE_ADDR'];
    $bd->visitasReales($ip);

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