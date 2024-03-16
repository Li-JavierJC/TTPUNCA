<?php
    include "../modelo/BD.php";
    include "../modelo/ingredientes.php";

    $bd = new BD();

    if (isset($_POST['gruposDatos'])) {
        // Obtener los datos del arreglo 'gruposDatos'
        $gruposDatos = $_POST['gruposDatos'];

        // Recorrer los grupos de datos
        foreach ($gruposDatos as $grupoDatos) {

            // Obtener los valores individuales
            $idIngrediente = $grupoDatos['idIngrediente'];
            $nombreIngrediente = $grupoDatos['nombreIngrediente'];
            $cantidad = $grupoDatos['cantidad'];
            $unidadMedida = $grupoDatos['unidadMedida'];
            $idPlatillo = $grupoDatos['idPlatillo'];

            // Verificar si el id del ingrediente existe
            if ($idIngrediente != -1) {
                // Crear una nueva instancia de Ingredientes solo cuando es una actualización
                $ingredientes = new Ingredientes();

                $ingredientes->setId($idIngrediente);
                $ingredientes->setNombre($nombreIngrediente);
                $ingredientes->setCantidad($cantidad);
                $ingredientes->setUnidadMedida($unidadMedida);
                $ingredientes->setIdPlatillo($idPlatillo);

                // Actualizar el ingrediente en la base de datos
                $bd->actualizarIngredientes($ingredientes);

            } else {

                // Cuando es un nuevo ingrediente, la instancia se creará dentro de la función registrarIngredientes
                $ingredientes = new Ingredientes();

                $ingredientes->setNombre($nombreIngrediente);
                $ingredientes->setCantidad($cantidad);
                $ingredientes->setUnidadMedida($unidadMedida);
                $ingredientes->setIdPlatillo($idPlatillo);

                // Registrar un nuevo ingrediente en la base de datos
                $bd->registrarIngredientes($ingredientes);
            }
        }
    }

?>
