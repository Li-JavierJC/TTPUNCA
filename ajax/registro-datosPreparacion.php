<?php
    include "../modelo/BD.php";
    include "../modelo/preparacion.php";

    $bd = new BD(); 

    //---------------------Registro de preparacion------------------
    if(isset($_FILES['fotoPreparacion'])){
        echo "Entro aqui";
        if(isset($_POST['paso']) && isset($_POST['instruccion']) && isset($_POST['idPlatillo'])){

            // Obtener los datos de los arreglos
            $pasos = $_POST['paso'];
            $instrucciones = $_POST['instruccion'];
            $fotos = $_FILES['fotoPreparacion'];
            $idPlatillo = $_POST['idPlatillo'];

            // Recorrer los datos individuales
            for($i = 0; $i < count($pasos); $i++) {
                // Crear una nueva instancia de Preparacion
                $preparacion = new Preparacion();

                // Obtener los valores individuales
                $paso = $pasos[$i];
                $instruccion = $instrucciones[$i];
                $fotoPreparacion = $fotos['tmp_name'][$i];
                $idPlatilloActual = $idPlatillo[$i];

                // Leer el contenido de la imagen como datos binarios
                $imgContent = addslashes(file_get_contents($fotoPreparacion));

                $preparacion->setPaso($paso);
                $preparacion->setInstruccion($instruccion);
                $preparacion->setFoto($imgContent);
                $preparacion->setIdPlatillo($idPlatilloActual);

                // Registrar la preparación en la base de datos con imagen
                $bd->registrarPreparacion($preparacion);
            }
        }   
    }else{
        echo "Entro en la condicion de si no";
        if(isset($_POST['paso']) && isset($_POST['instruccion']) && isset($_POST['idPlatillo'])){

            // Obtener los datos de los arreglos
            $pasos = $_POST['paso'];
            $instrucciones = $_POST['instruccion'];
            $idPlatillo = $_POST['idPlatillo'];

            // Recorrer los datos individuales
            for($i = 0; $i < count($pasos); $i++) {
                // Crear una nueva instancia de Preparacion
                $preparacion = new Preparacion();

                // Obtener los valores individuales
                $paso = $pasos[$i];
                $instruccion = $instrucciones[$i];
                $idPlatilloActual = $idPlatillo[$i];


                $preparacion->setPaso($paso);
                $preparacion->setInstruccion($instruccion);
                $preparacion->setIdPlatillo($idPlatilloActual);

                // Registrar la preparación en la base de datos sin imagen 
                $bd->registrarPreparacionI($preparacion);
            }
        }
    }
?>
