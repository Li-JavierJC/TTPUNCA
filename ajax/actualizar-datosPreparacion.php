<?php
include "../modelo/BD.php";
include "../modelo/preparacion.php";

$bd = new BD();


// Verificar que se recibieron los datos mediante una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idPreparaciones = $_POST['idPreparacion'];
    $pasos = $_POST['paso']; 
    $instrucciones = $_POST['instruccion'];
    $estatus=$_POST['fotoStatus'];
    $fotos = $_FILES['fotoPreparacion'];
    $idPlatillo = $_POST['idPlatillo'];

    // Recorrer los datos individuales
    for ($i = 0; $i < count($idPreparaciones); $i++) {
        // Crear una nueva instancia de Preparacion para cada preparación
        $preparacion = new Preparacion();

        $idPreparacion = $idPreparaciones[$i];
        $paso = $pasos[$i];
        $instruccion = $instrucciones[$i];
     
        $idPlatilloActual = $idPlatillo[$i];

        // Verificar si se ha subido una imagen
        if ($estatus[$i] != -1) {
             $fotoPreparacion = $fotos['tmp_name'][$i];
            // Leer el contenido de la imagen como datos binarios
            $imgContent = addslashes(file_get_contents($fotoPreparacion));

            $preparacion->setId($idPreparacion);
            $preparacion->setPaso($paso);
            $preparacion->setInstruccion($instruccion);
            $preparacion->setFoto($imgContent);
            $preparacion->setIdPlatillo($idPlatilloActual);

            // Llamar a la función de actualización con imagen
            $bd->actualizarPreparacionI($preparacion);
        } else {
            $preparacion->setId($idPreparacion);
            $preparacion->setPaso($paso);
            $preparacion->setInstruccion($instruccion);
            $preparacion->setIdPlatillo($idPlatilloActual);

            // Llamar a la función de actualización sin imagen
            $bd->actualizarPreparacion($preparacion);
        }

        if ($idPreparacion == -1) {
            
                $imgContent = addslashes(file_get_contents($fotoPreparacion));
                
                $preparacion->setPaso($paso);
                $preparacion->setInstruccion($instruccion);
                $preparacion->setFoto($imgContent);
                $preparacion->setIdPlatillo($idPlatilloActual);

                $bd->registrarPreparacion($preparacion);
            
        }
    }
}
?>

