<?php 

include "../modelo/BD.php";
include "../modelo/alumno.php";
echo '<link href="../ccs/registro-alumno.css" type="text/css" rel="stylesheet">';


$bd = new BD();
$alumno= new Alumno();

if(!empty($_POST["usuario"])) {

    if($bd->buscarAlumno($_POST['usuario'])){
        echo "<span style='color:#09ff0d;font-weight: bold;'>Usuario disponible.</span>";
    }else{
        echo "<span style='color:#ff0404;font-weight: bold;'> Usuario no disponible, elige otro.</span>";
    }
}



?>