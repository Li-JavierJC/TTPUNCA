<?php
    $pageTitle = "Primer Grado";
    $sesion = new Sesion();
    $sesion->init();
    ?>
    <section class="nombreUsuario">
        <h2 >Bienvenido a Primer Grado de Secundaria:&nbsp;&nbsp;<?php echo $_SESSION['usuario']; ?></h2>
    </section>
    <?php
    
?>