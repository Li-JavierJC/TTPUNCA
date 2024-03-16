<?php
    include "../modelo/BD.php";
    include "../modelo/utencilio.php";

    $bd = new BD();

    if (isset($_POST['gruposDatos'])) {
        // Obtener los datos del arreglo 'gruposDatos'
        $gruposDatos = $_POST['gruposDatos'];

        // Recorrer los grupos de datos
        foreach ($gruposDatos as $grupoDatos) {

            // Obtener los valores individuales
            $idUtencilio = $grupoDatos['idUtencilio'];
            $nombreUtencilio = $grupoDatos['nombreUtencilio'];
            $cantidad = $grupoDatos['cantidad'];
            $idPlatillo = $grupoDatos['idPlatillo'];

            // Verificar si el id del ingrediente existe
            if ($idUtencilio != -1) {
                // Crear una nueva instancia de utencilio solo cuando es una actualización
                $utencilio = new Utencilio();

                $utencilio->setId($idUtencilio);
                $utencilio->setNombre($nombreUtencilio);
                $utencilio->setCantidad($cantidad);
                $utencilio->setIdPlatillo($idPlatillo);

                //Actualizar el utencilio en la base de datos
                $bd->actualizarUtencilio($utencilio);

            } else {

                // Cuando es un nuevo utencilio, la instancia se creará dentro de la función registrarUtencilio
                $utencilio = new Utencilio();

                $utencilio->setNombre($nombreUtencilio);
                $utencilio->setCantidad($cantidad);
                $utencilio->setIdPlatillo($idPlatillo);

                // Registrar un nuevo utencilio en la base de datos
                $bd->registrarUtencilio($utencilio);
            }
        }
    }

?>
