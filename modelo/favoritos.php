<?php
	/**
	 * Clase de Favoritos
	 */
	class Favoritos{
		/**Declaracio de los atributos de Favoritos*/
		private $id;
		private $fecha;
		private $idUsuario;
		private $idPlatillo;

		/**Metodo contructor de Favoritos*/
		function __construct(){
			$id=0;
			$fecha=0;
			$idUsuario=0;
			$idPlatillo=0;
		}

		/**Descriptores de acceso del atributo id */
        public function setId($id){ $this->id=$id;}
        public function getId(){    return $this->id;}

        /**Descriptores de acceso del atributo fecha */
		public function setFecha($fecha){	$this->fecha=$fecha;}
		public function getFecha(){ return $this->fecha;}

		/**Descriptores de acceso del atributo idUsuario */
		public function setIdUsuario($idUsuario){	$this->idUsuario=$idUsuario;}
		public function getIdUsuario(){	return $this->idUsuario;}

		/**Descriptores de acceso del atributo idPlatllo */
		public function setIdPlatillo($idPlatillo){	$this->idPlatillo=$idPlatillo;}
		public function getIdPlatillo(){	return $this->idPlatillo;}
	}
?>