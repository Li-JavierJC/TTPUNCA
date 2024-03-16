<?php
   include "../modelo/BD.php";
   include "../modelo/validacion.php";

   $bd = new BD();

   //---------------------Actualizacion de estado de validacion------------------
    if($_SERVER["REQUEST_METHOD"] == "POST"){
         $validacion = new validacion();

        $validacion->setIdPlatillo($_POST['idPlatillo']);
        $validacion->setSeccionDatos($_POST['seccionDatos']);
        $validacion->setSeccionIngredientes($_POST['seccionIngredientes']);
        $validacion->setSeccionUtencilio($_POST['seccionUtencilio']);
        $validacion->setSeccionPreparacion($_POST['seccionPreparacion']);
        $validacion->setSeccionComplemento($_POST['seccionComplemento']);
        $validacion->setNota($_POST['nota']);

        $bd->validarSeccionPlatillosU($validacion);
        
    }

?>