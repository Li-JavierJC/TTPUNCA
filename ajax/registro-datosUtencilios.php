<?php
    include "../modelo/BD.php";
    include "../modelo/utencilio.php";

    $bd = new BD();
    $utencilio = new Utencilio();

   //---------------------Registro de platillos------------------
    if(isset($_POST['gruposDatosU'])){
        // Obtener los datos del arreglo 'gruposDatos'
        $gruposDatosU = $_POST['gruposDatosU'];

        //Recorrer los grupos de datos
        foreach ($gruposDatosU as $grupoDatosU) {
            // Obtener los valores individuales
            $nombreUtencilio = $grupoDatosU['nombreUtencilio'];
            $cantidad = $grupoDatosU['cantidad'];
            $idPlatillo = $grupoDatosU['idPlatillo'];

            $utencilio->setNombre($nombreUtencilio);
            $utencilio->setCantidad($cantidad);
            $utencilio->setIdPlatillo($idPlatillo);

            // Registrar el utencilio en la base de datos
            $bd->registrarUtencilio($utencilio);
        }
    }
?>
