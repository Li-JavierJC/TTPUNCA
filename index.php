<?php 
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title><?php echo $pageTitle; ?></title>
	
		<link rel="icon" type="image/png" href="vista/images/iconos/logo1.png">
		<link rel="stylesheet"  href="vista/css/sweetalert2.min.css">
		<link rel="stylesheet"  href="vista/css/bootstrap.min.css">
		<link rel="stylesheet"  href="vista/css/header.css">
		<link rel="stylesheet"  href="vista/css/footer.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="vista/css/jquery.dataTables.min.css">

		<!--Seleciona los estilos css de la pagina selecionada -->
		<link rel="stylesheet" type="text/css" href="vista/css/<?php echo $paginaSeleccionada.".css?v=1"; ?>">
		
		<!-- Fuentes de letras -->	
		<link href="https://fonts.googleapis.com/css2?family=Quando&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
		

		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script src="vista/js/sweetalert2.all.min.js"></script>
		<script src="vista/js/bootstrap.min.js"></script>
		<script src="vista/js/jquery-3.6.0.min.js"></script>
		<script src="vista/js/jquery.dataTables.min.js"></script>
		
		
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
		<script src="https://kit.fontawesome.com/ec584090cd.js" crossorigin="anonymous"></script>
		
		<!--Seleciona los archivos de javasde la pagina selecionada  -->
		<script src="vista/js/<?php echo $paginaSeleccionada; ?>.js"></script>



		<!-- Google tag (gtag.js)  Parte de codigo de Google Analitics 
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-1QJZNLZWMM"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-1QJZNLZWMM');
		</script>
		-->

	</head>
	
	<body>
		<?php
		include "vista/header.html";
		include "vista/$paginaSeleccionada.html";
		include "vista/footer.html";
		?>
	</body>
	</html>