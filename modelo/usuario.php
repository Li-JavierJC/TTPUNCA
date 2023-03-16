<?php
    /**
	 * Clase de Usuaro
	 */
    class Usuario{
        /**Declaracion de los atributos de Usuario*/
        private $id;
        private $nombre;
        private $apellidos;
        private $sexo;
        private $escolaridad;
        private $ocupacion;
        private $domicilio;
        private $edad;
        private $usuario;
        private $contrasena;
        private $nivelUsuario;
    
         /**Metodo constructor de Usuario*/
        public function __construct(){
            $id=0;
            $nombre="";
            $apellidos="";
            $sexo="";
            $escolaridad="";
            $ocupacion="";
            $domicilio="";
            $edad=0;
            $usuario="";
            $contrasena="";
            $nivelUsuario=0;
        

        }
    
        /**Descriptores de acceso del aributo id */
        public function setId($id){ $this->id=$id; }
        public function getId(){ return  $this->id; }

        /**Descriptores de acceso del atributo nombre */
        public function setNombre($nombre){ $this->nombre=$nombre; }
        public function getNombre(){ return $this->nombre; }

        /**Descriptores de acceso del atributo apellidos */
        public function setApellidos($apellidos){ $this->apellidos=$apellidos; }
        public function getApellidos(){ return $this->apellidos; }

        /**Descriptores de acceso del atributo sexo */
        public function setSexo($sexo){ $this->sexo=$sexo; }
        public function getSexo(){ return $this->sexo; }

        /**Descriptores de acceso del atributo escolaridad */
        public function setEscolaridad($escolaridad){ $this->escolaridad=$escolaridad; }
        public function getEscolaridad(){ return $this->escolaridad; }
        
        /**Descriptores de acceso del atributo ocupacion */
        public function setOcupacion($ocupacion){ $this->ocupacion=$ocupacion; }
        public function getOcupacion(){ return $this->ocupacion; }

        /**Descriptores de acceso del atributo domicilio */
        public function setDomicilio($domicilio){ $this->domicilio=$domicilio; }
        public function getDomicilio(){ return $this->domicilio; }

        /**Descriptores de acceso del atributo edad */
        public function setEdad($edad){ $this->edad=$edad; }
        public function getEdad(){ return $this->edad; }

        /**Descriptores de acceso del atributo usuario */
        public function setUsuario($usuario){ $this->usuario=$usuario; }
        public function getUsuario(){return $this->usuario; }

        /**Descriptores de acceso del atributo contrasena */
        public function setContrasena($contrasena){ $this->contrasena=$contrasena;}
        public function getContrasena(){ return $this->contrasena; }

        /**Descriptores de acceso del atributo nivelUsaurio */
        public function setNivelUsuario($nivelUsuario){ $this->nivelUsuario=$nivelUsuario; }
        public function getNivelUsuario(){ return $this->nivelUsuario; }
    }
?>