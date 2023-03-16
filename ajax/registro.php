<?php 

include "../modelo/BD.php";
include "../modelo/usuario.php";
echo '<link href="../ccs/registro.css" type="text/css" rel="stylesheet">';


$bd = new BD();
$usuario= new Usuario();

if(!empty($_POST["usuario"])) {

    if($bd->buscarUsuario($_POST['usuario'])){
        echo "<span style='color:#09ff0d;font-weight: bold;'>Usuario disponible.</span>";
    }else{
        echo "<span style='color:#ff0404;font-weight: bold;'> Usuario no disponible, elige otro.</span>";
    }
}

?>
