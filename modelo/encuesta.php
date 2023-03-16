<?php
	/**
	 * Clase de Encuesta
	 */
	class Encuesta{
		/**Declaracio de los atributos de Encuesta*/
		private $id;
		private $nombre;
		private $sexo;
		private $edad;
		private $medio;
		private $estado;
		private $municipio;
		private $comentario;
		private $calificacion;
		private $fecha;

		/**Metodo contructor del administrador*/
		function __construct(){
			$id=0;
			$nombre="";
			$sexo="";
			$edad="";
			$medio="";
			$estado="";
			$estado="";
			$municipio="";
			$comentario="";
			$calificacion="";
			$fecha="";
		}

		/**Descriptores de acceso del atributo id */
		public function setId($id){$this->id=$id;}
		public function getId(){return $this->id; }

		/**Descriptores de acceso del atributo nombre */
		public function setNombre($nombre){$this->nombre=$nombre; }
		public function getNombre(){return $this->nombre; }

		/**Descriptores de acceso del atributo sexo */
		public function setSexo($sexo){$this->sexo=$sexo; }
		public function getSexo(){return $this->sexo; }

		/**Descriptores de acceso del atributo edad */
		public function setEdad($edad){$this->edad=$edad; }
		public function getEdad(){ return $this->edad; }

		/**Descriptores de acceso del atributo medio */
		public function setMedio($medio){$this->medio=$medio; }
		public function getMedio(){return $this->medio; }

		/**Descriptores de acceso del atributo estado */
		public function setEstado($estado){$this->estado=$estado; }
		public function getEstado(){return $this->estado; }

		/**Descriptores de acceso del atributo municipio */
		public function setMunicipio($municipio){$this->municipio=$municipio; }
		public function getMunicipio(){return $this->municipio; }

		/**Descriptores de acceso del atributo comentario */
		public function setComentario($comentario){$this->comentario=$comentario; }
		public function getComentario(){ return $this->comentario; }

		/**Descriptores de acceso del atributo calificacion */
		public function setCalificacion($calificacion){$this->calificacion=$calificacion; }
		public function getCalificacion(){ return $this->calificacion; }

		/**Descriptores de acceso del atributo fecha */
		public function setFecha($fecha){$this->fecha=$fecha; }
		public function getFecha(){return $this->fecha; }
	}

?>