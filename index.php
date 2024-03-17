<?php
	/**
	 * Universidad de la cañada
	 * Titulo del Programa: "Plataforma Web para la Transferencia Tecnológica de Platillos elaborados por estudiantes de la Universidad de la Cañada."
	 * Egresado de la Licenciatura en Informática
	 * Director: Dr. Miguel Angel Sánchez Acevedo
	 * Alumno egresado: Javier Juarez Carrera
	 * Marzo 2024
	 */
	session_start();
	include "modelo/BD.php";
	include "modelo/usuario.php";
	include "modelo/administrador.php";
	include "modelo/alumno.php";
	include "modelo/platillo.php";
	include "modelo/comentario.php";
	include "modelo/visitas.php";
	include "modelo/favoritos.php";
	include "modelo/encuesta.php";
	include "modelo/ingredientes.php";
	include "modelo/preparacion.php";
	include "modelo/utencilio.php";
	include "modelo/nutriente.php";
	include "modelo/complemento.php";
	include "modelo/validacion.php";
	
	
	if (!isset($_REQUEST['page'])) { $_REQUEST['page'] = "inicio"; }
	if (empty($_REQUEST['page'])) { $_REQUEST['page'] = "inicio"; }
	if (!isset($_SESSION['loggedin'])) { $_SESSION['loggedin'] = false; }


	$paginaSeleccionada = $_REQUEST['page'];
	include "controlador/$paginaSeleccionada.php";
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $pageTitle; ?></title>

		<!-- Icono de la plataforma-->
		<link rel="icon" type="image/png" href="vista/images/iconos/logo02.png">

		<!-- Archivos de estilos del proyecto -->
		<link rel="stylesheet"  href="vista/css/sweetalert2.min.css">
		<link rel="stylesheet"  href="vista/css/header.css">
		<link rel="stylesheet"  href="vista/css/bootstrap.min.css">
		<link rel="stylesheet"  href="vista/css/footer.css">
		<link rel="stylesheet" href="vista/css/pctoaxaca.css?v=2">
		<link rel="stylesheet" type="text/css" href="vista/css/jquery.dataTables.min.css">

		<!-- Archivos de estilos vinculada con un CDN  -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
		
		<!-- Enlace al archivo CSS de FancyApps -->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
		
		

		<!--Seleciona los estilos css de la pagina selecionada -->
		<link rel="stylesheet" type="text/css" href="vista/css/<?php echo $paginaSeleccionada.".css?v=1"; ?>">
		
		<!-- Fuentes de letras -->	
		<link href="https://fonts.googleapis.com/css2?family=Quando&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
		

		
		<!--Seleciona los archivos de javasde la pagina selecionada  -->
		<script src="vista/js/<?php echo $paginaSeleccionada; ?>.js"></script>

		<!-- Archivos de javascritp del proyecto  -->
		<script src="vista/js/sweetalert2.all.min.js"></script>
		<script src="vista/js/jquery-3.6.0.min.js"></script>
		<script src="vista/js/popper.min.js"></script>
		<script src="vista/js/bootstrap.bundle.min.js"></script>
		<script src="vista/js/jquery.dataTables.min.js"></script>
		<script src="vista/js/footer.js"></script>
		
		<!-- Archivos de javascritp vinculada con un CDN  -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script src="https://kit.fontawesome.com/ec584090cd.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" ></script>
		
		
		<!-- Enlace al archivo JavaScript de FancyApps -->
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
		

		<!-- Google tag (gtag.js)  Parte de codigo de Google Analitics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-1QJZNLZWMM"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-1QJZNLZWMM');
		</script>
		
	</head>
	<body>
		<?php
		include "vista/header.html";
		include "vista/$paginaSeleccionada.html";
		include "vista/footer.html";
		?>
	</body>
</html>