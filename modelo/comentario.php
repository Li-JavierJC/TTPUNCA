<?php
	/**
	 * Clase del comentario
	 */
	class Comentario{
		/**Declaracion de atributos de Comentario*/
		private $id;
		private $nombre;
		private $comentario;
		private $calificacion;
		private $cocinado;
		private $foto;
		private $fecha;
		private $idPlatillo;
		private $idUsuario;
		 
        /**Metodo contructor del administrador*/
		function __construct(){
			$id=0;
			$nombre="";
			$comentario="";
			$calificacion="";
			$cocinado="";
			$foto="";
			$fecha="";
			$idPlatillo=0;
			$idUsuario=0;
		}

		//Descriptores de acceso del id
		public function setId($id){ $this->id=$id;}
        public function getId(){    return $this->id;}

        //Descirptores de acceso de nombre
        public function setNombre($nombre){ $this->nombre=$nombre;}
        public function getNombre(){    return $this->nombre;}

        //Descriptores de acceso de cometario
        public function setComentario($comentario){ $this->comentario=$comentario;}
        public function getComentario(){	return $this->comentario;}

        //Descriptores de acceso de cocinado
        public function setCalificacion($calificacion){ $this->calificacion=$calificacion;}
        public function getCalificacion(){	return $this->calificacion;}

        //Descriptores de acceso de cocinado
        public function setCocinado($cocinado){	$this->cocinado=$cocinado;}
		public function getCocinado(){ return $this->cocinado;}

		//Descriptores de acceso de foto
		public function setFoto($foto){	$this->foto=$foto;}
		public function getFoto(){ return $this->foto;}

		//descriptores de acceso de fecha
		public function setFecha($fecha){	$this->fecha=$fecha;}
		public function getFecha(){ return $this->fecha;}

		//Descriptores de acceso de idPlatllo
		public function setIdPlatillo($idPlatillo){	$this->idPlatillo=$idPlatillo;}
		public function getIdPlatillo(){	return $this->idPlatillo;}

		//Descriptores de acceso de idUsuario
		public function setIdUsuario($idUsuario){	$this->idUsuario=$idUsuario;}
		public function getIdUsuario(){	return $this->idUsuario;}
	}
?>