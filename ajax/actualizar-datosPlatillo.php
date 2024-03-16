<?php
include "../modelo/BD.php";
include "../modelo/platillo.php";

$bd = new BD();
$platillo = new Platillo();

// Verificar que se recibieron los datos mediante una solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validar que se ha subido una imagen válida
    if (isset($_FILES["imagenPlatillo"]["tmp_name"]) && getimagesize($_FILES["imagenPlatillo"]["tmp_name"])) {
        // Obtener el contenido de la imagen subida y almacenarlo en $imgContent
        $image = $_FILES['imagenPlatillo']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        // Configurar las propiedades del platillo con los datos del formulario
        $platillo->setId($_POST['idPlatillo']);
        $platillo->setNombre($_POST['nombrePlatillo']);
        $platillo->setDescripcion($_POST['descripcion']);
        $platillo->setTiempoPreparacion($_POST['tiempoPreparacion']);
        $platillo->setTiempoCoccion($_POST['tiempoCoccion']);
        $platillo->setCaducidad($_POST['caducidad']);
        $platillo->setPorciones($_POST['porciones']);
        $platillo->setCostoPromedio($_POST['costoPromedio']);
        $platillo->setRendimiento($_POST['rendimiento']);
        $platillo->setTiempoComida($_POST['tiempoComida']);
        $platillo->setImagen($imgContent);

        // Llamar a la función de actualización para el platillo con imagen
        $bd->actualizarDatosPlatilloI($platillo);

        // Agregar cualquier otra lógica o redireccionamiento después de la actualización si es necesario
        // ...
    } else {
        // Si no se subió una imagen válida, omitir el campo imagen en la actualización
        $platillo->setId($_POST['idPlatillo']);
        $platillo->setNombre($_POST['nombrePlatillo']);
        $platillo->setDescripcion($_POST['descripcion']);
        $platillo->setTiempoPreparacion($_POST['tiempoPreparacion']);
        $platillo->setTiempoCoccion($_POST['tiempoCoccion']);
        $platillo->setCaducidad($_POST['caducidad']);
        $platillo->setPorciones($_POST['porciones']);
        $platillo->setCostoPromedio($_POST['costoPromedio']);
        $platillo->setRendimiento($_POST['rendimiento']);
        $platillo->setTiempoComida($_POST['tiempoComida']);

        // Llamar a la función de actualización para el platillo sin imagen
        $bd->actualizarDatosPlatillo($platillo);

        // Agregar cualquier otra lógica o redireccionamiento después de la actualización si es necesario
        // ...
    }
}
?>
