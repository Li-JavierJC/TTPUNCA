<?php
    include "../modelo/BD.php";
    include "../modelo/ingredientes.php";

    $bd = new BD();
    $ingredientes = new Ingredientes();

   //---------------------Registro de platillos------------------
    if(isset($_POST['gruposDatos'])){
        // Obtener los datos del arreglo 'gruposDatos'
        $gruposDatos = $_POST['gruposDatos'];

        //Recorrer los grupos de datos
        foreach ($gruposDatos as $grupoDatos) {
            // Obtener los valores individuales
            $nombreIngrediente = $grupoDatos['nombreIngrediente'];
            $cantidad = $grupoDatos['cantidad'];
            $unidadMedida = $grupoDatos['unidadMedida'];
            $idPlatillo = $grupoDatos['idPlatillo'];

            $ingredientes->setNombre($nombreIngrediente);
            $ingredientes->setCantidad($cantidad);
            $ingredientes->setUnidadMedida($unidadMedida);
            $ingredientes->setIdPlatillo($idPlatillo);

            // Registrar el ingrediente en la base de datos
            $bd->registrarIngredientes($ingredientes);
        }
    }
?>
