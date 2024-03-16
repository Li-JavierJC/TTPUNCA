<?php
include "../modelo/BD.php";
include "../modelo/validacion.php";

$bd = new BD();
$validacion = new validacion();

   //---------------------Registro de validacion------------------
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $validacion->setIdPlatillo($_POST['idPlatillo']);
        $validacion->setSeccionDatos($_POST['seccionDatos']);
        $validacion->setSeccionIngredientes($_POST['seccionIngredientes']);
        $validacion->setSeccionUtencilio($_POST['seccionUtencilio']);
        $validacion->setSeccionPreparacion($_POST['seccionPreparacion']);
        $validacion->setSeccionNutriente($_POST['seccionNutriente']);
        $validacion->setSeccionComplemento($_POST['seccionComplemento']);

        $bd->registrarValidacion($validacion);
        
    }

?>