<?php
	include "modelo/session.php";
	include "modelo/BD.php";
	include "modelo/usuario.php";

	if (!isset($_REQUEST['page'])) { $_REQUEST['page'] = "inicio"; }
	if (empty($_REQUEST['page'])) { $_REQUEST['page'] = "inicio"; }
	if (!isset($_SESSION['loggedin'])) { $_SESSION['loggedin'] = false; }


	$paginaSeleccionada = $_REQUEST['page'];

	include "controlador/$paginaSeleccionada.php";
?>
<DOCTYPE html>
<html lang="es-MX">
	<head>
		<meta charset="utf-8">
		<title><?php echo $pageTitle; ?></title>
		<link rel="stylesheet" href="vista/css/educacion.css?v=2">
		<link rel="stylesheet" href="vista/css/sweetalert2.min.css">
		<link rel="stylesheet" href="vista/css/<?php echo $paginaSeleccionada.".css?v=1"; ?>">
		
		<!--<link href="https://fonts.googleapis.com/css?family=Concert+One&display=swap" rel="stylesheet">  
		<link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Boogaloo&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Signika:700,300,600" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Paytone+One&display=swap" rel="stylesheet">  
		<link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Tomorrow&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Coming+Soon|M+PLUS+Rounded+1c|Turret+Road&display=swap" rel="stylesheet">
-->
		<script src="vista/js/sweetalert2.all.min.js"></script>
		<script src="vista/js/jquery-3.6.0.min.js"></script>
		
		<script src="vista/js/educacion.js"></script>
		<script src="vista/js/<?php echo $paginaSeleccionada; ?>.js"></script>
	</head>
	<body>
		<?php
		include "vista/header.html";
		include "vista/$paginaSeleccionada.html";
		include "vista/footer.html";
		?>
	</body>
</html>