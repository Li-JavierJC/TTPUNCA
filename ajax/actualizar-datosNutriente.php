<?php
    include "../modelo/BD.php";
    include "../modelo/nutriente.php";

    $bd = new BD();

    if (isset($_POST['gruposDatos'])) {
        // Obtener los datos del arreglo 'gruposDatos'
        $gruposDatos = $_POST['gruposDatos'];

        // Recorrer los grupos de datos
        foreach ($gruposDatos as $grupoDatos) {

            // Obtener los valores individuales
            $idNutriente = $grupoDatos['idNutriente'];
            $nombreNutriente = $grupoDatos['nombreNutriente'];
            $cantidadR = $grupoDatos['cantidadR'];
            $cantidadP = $grupoDatos['cantidadP'];
            $unidadMedida = $grupoDatos['unidadMedida'];
            $idPlatillo = $grupoDatos['idPlatillo'];

            // Verificar si el id del nutriente existe
            if ($idNutriente != -1) {
                // Crear una nueva instancia de nutriente solo cuando es una actualización
                $nutriente = new Nutriente();

                $nutriente->setId($idNutriente);
                $nutriente->setNombre($nombreNutriente);
                $nutriente->setCantidadR($cantidadR);
                $nutriente->setCantidadP($cantidadP);
                $nutriente->setUnidadMedida($unidadMedida);
                $nutriente->setIdPlatillo($idPlatillo);

                //Actualizar el nutriente en la base de datos
                $bd->actualizarNutriente($nutriente);

            } else {

                // Cuando es un nuevo nutriente, la instancia se creará dentro de la función registrarnutriente
                $nutriente = new Nutriente();

                $nutriente->setNombre($nombreNutriente);
                $nutriente->setCantidadR($cantidadR);
                $nutriente->setCantidadP($cantidadP);
                $nutriente->setUnidadMedida($unidadMedida);
                $nutriente->setIdPlatillo($idPlatillo);

                // Registrar un nuevo nutriente en la base de datos
                $bd->registrarNutriente($nutriente);
            }
        }
    }

?>
