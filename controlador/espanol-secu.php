<?php
    $pageTitle = "Lengua Materna Español";
    $sesion = new Sesion();
    $sesion->init();

    ?>
    <section class="nombreUsuario">
        <h2 >Bienvenido a la Materia de Español:&nbsp;&nbsp;<?php echo $_SESSION['nombre']; ?></h2>
    </section>
    <?php
?>