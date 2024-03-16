<?php
    include "../modelo/BD.php";
    $bd = new BD();

    //-------mustra el total de cometarios
    $totalComentario=$bd->totalComentarios();
    echo $totalComentario;
?>