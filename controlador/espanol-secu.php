<?php
    $pageTitle = "Lengua Materna Español";
    $sesion = new Sesion();
    $sesion->init();

    ?>
    <section class="nombreUsuario">
        <h2 >Bienvenido a la Materia de Español:&nbsp;&nbsp;<?php echo $_SESSION['usuario']; ?></h2>
    </section>
    <?php
?>