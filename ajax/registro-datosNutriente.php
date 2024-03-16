<?php
    include "../modelo/BD.php";
    include "../modelo/nutriente.php";

    $bd = new BD();
    $nutriente = new Nutriente();

   //---------------------Registro de platillos------------------
    if(isset($_POST['gruposDatosN'])){
        // Obtener los datos del arreglo 'gruposDatosN'
        $gruposDatosN = $_POST['gruposDatosN'];

        //Recorrer los grupos de datos
        foreach ($gruposDatosN as $grupoDatosN) {
            // Obtener los valores individuales
            $nombreNutriente = $grupoDatosN['nombreNutriente'];
            $cantidadR = $grupoDatosN['cantidadR'];
            $cantidadP = $grupoDatosN['cantidadP'];
            $unidadMedida = $grupoDatosN['unidadMedida'];
            $idPlatillo = $grupoDatosN['idPlatillo'];

            $nutriente->setNombre($nombreNutriente);
            $nutriente->setCantidadR($cantidadR);
            $nutriente->setCantidadP($cantidadP);
            $nutriente->setUnidadMedida($unidadMedida);
            $nutriente->setIdPlatillo($idPlatillo);

            // Registrar el ingrediente en la base de datos
            $bd->registrarNutriente($nutriente);
        }
    }
?>