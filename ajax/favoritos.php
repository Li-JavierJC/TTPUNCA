<?php

	include "../modelo/BD.php";
	include "../modelo/favoritos.php";

	$bd= new BD();
	$favoritos= new Favoritos();
	/*Verifcar que el platillo no este añadido aun en favoritos*/
	$favoritos=$bd->verificarFavorios($_POST['idUsuario'], $_POST['idPlatillo']);
	if (empty($favoritos->getId())) {
		$favoritos->setFecha($_POST['fecha']);
		$favoritos->setIdUsuario($_POST['idUsuario']);
		$favoritos->setIdPlatillo($_POST['idPlatillo']);

		/*Se añade a favoritos*/
		$bd->guardarFavoritos($favoritos);	
	}
	
?>
