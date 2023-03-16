<?php
	/**
	 * Clase del Alumno
	 */
    class Alumno{
        //Declaracion de los atributos
        private $id;
        private $nombre;
        private $apellidos;
        private $sexo;
        private $semestre;
        private $carrera;
        private $edad;
        private $usuario;
        private $contrasena;
        private $nivelUsuario;

        //metodo constructor del alumno
        public function __construct(){
            $id=0;
            $nombre="";
            $apellidos="";
            $sexo="";
            $semestre="";
            $carrera="";
            $edad=0;
            $usuario="";
            $contrasena="";
            $nivelUsuario=0;
        }

        /**Descriptores de acceso del atributo id */
        public function setId($id){ $this->id=$id; }
        public function getId(){ return  $this->id; }

        /**Descriptoires de acceso del atributo nombre */
        public function setNombre($nombre){ $this->nombre=$nombre; }
        public function getNombre(){ return $this->nombre;}

        /**Descriptores de acceso del atributo apellidos */
        public function setApellidos($apellidos){ $this->apellidos=$apellidos; }
        public function getApellidos(){ return $this->apellidos;}

        /**Descriptores de acceso del atributo sexo */
        public function setSexo($sexo){ $this->sexo=$sexo; }
        public function getSexo(){ return $this->sexo; }

        /**Descriptores de acceso del atributo semestre */
        public function setSemestre($semestre){ $this->semestre=$semestre; }
        public function getSemestre(){ return $this->semestre; }
        
        /**Descriptores de acceso del atributo carrera */
        public function setCarrera($carrera){ $this->carrera=$carrera; }
        public function getCarrera(){ return $this->carrera; }

        /**Descriptores de acceso del atributo edad */
        public function setEdad($edad){ $this->edad=$edad; }
        public function getEdad(){ return $this->edad; }

        /**Descritores de acceso del atributo usuario */
        public function setUsuario($usuario){ $this->usuario=$usuario; }
        public function getUsuario(){ return $this->usuario; }

        /**Decriptores de acceso del atributo contraseña */
        public function setContrasena($contrasena){ $this->contrasena=$contrasena; }
        public function getContrasena(){ return $this->contrasena; }

        /**Descriptores de acceso del atributo nivelUsuario */
        public function setNivelUsuario($nivelUsuario){ $this->nivelUsuario=$nivelUsuario; }
        public function getNivelUsuario(){ return $this->nivelUsuario; }

    }

?>