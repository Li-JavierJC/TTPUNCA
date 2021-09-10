<?php
   
    $pageTitle = "Primer Grado";
    $sesion = new Sesion();
    $sesion->init();
    $usuario=$_SESSION['usuario'];
    ?>
    <section class="nombreUsuario">
        <h2 >Bienvenido a Primer Grado de Secundaria:&nbsp;&nbsp;<?php echo $_SESSION['usuario']; ?></h2>
        <script src="vista/js/sweetalert2.all.min.js"></script>
		<script src="vista/js/jquery-3.6.0.min.js"></script>
        <script>
            Swal.fire(
               'Bienvenido!',
                '<?php echo $usuario ?>',
                'success'               
            )
        </script>
    </section>
    <?php
    
?>