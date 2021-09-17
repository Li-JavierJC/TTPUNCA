<?php
   
    $pageTitle = "Primer Grado";
    $sesion = new Sesion();
    $sesion->init();
    $nombre=$_SESSION['nombre'];
    $apellidos=$_SESSION['apellidos'];
    ?>
    <section class="nombreUsuario">
        <h2 >Bienvenido a Primer Grado de Secundaria:&nbsp;&nbsp;<?php echo $_SESSION['nombre']?>&nbsp;<?php echo $_SESSION['apellidos']?></h2>
        <script src="vista/js/sweetalert2.all.min.js"></script>
		<script src="vista/js/jquery-3.6.0.min.js"></script>
        <script>
            Swal.fire(
               'Bienvenido!',
                '<?php echo $nombre ?>',
                'success'               
            )
        </script>
    </section>
    <?php
    
?>