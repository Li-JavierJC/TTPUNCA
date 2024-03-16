<?php
include "../modelo/BD.php";
include "../modelo/platillo.php";

$bd = new BD();
$platillo = new Platillo();

   //---------------------Registro de platillos------------------
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $revisar= getimagesize($_FILES["imagenPlatillo"]["tmp_name"]);
        if ($revisar !== false) {

            $image= $_FILES['imagenPlatillo']['tmp_name'];
            $imgContent= addslashes(file_get_contents($image));
    
            $platillo->setNombre($_POST['nombrePlatillo']);
            $platillo->setDescripcion($_POST['descripcion']);
            $platillo->setTiempoPreparacion($_POST['tiempoPreparacion']);
            $platillo->setTiempoCoccion($_POST['tiempoCoccion']);
            $platillo->setCaducidad($_POST['caducidad']);
            $platillo->setPorciones($_POST['porciones']);
            $platillo->setCostoPromedio($_POST['costoPromedio']);
            $platillo->setRendimiento($_POST['rendimiento']);
            $platillo->setTiempoComida($_POST['tiempoComida']);
            $platillo->setAutor($_POST['autor']);
            $platillo->setImagen($imgContent);
            $platillo->setIdAlumno($_POST['idAlumno']);
            $platillo->setIdUsuario($_POST['idUsuario']);
            $platillo->setIdAdministrador($_POST['idAdministrador']);



           $bd->registrarPlatillo($platillo);
        }
        
    }


?>
