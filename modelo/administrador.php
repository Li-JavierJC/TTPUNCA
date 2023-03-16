<?php
    /**
     *Clase de Administrador
     */
    Class Administrador{
        /**Declaracion de atributos del administrador*/
        private $id;
        private $usuario;
        private $contrasena;
        private $nivelUsuario;
        
        /**Metodo contructor del administrador*/
        public function __construct(){
            $id=0;
            $usuario="";
            $contrasena="";
            $nivelUsuario=0;
        }

        /**Descriptores de acceso del atributo id */
        public function setId($id){ $this->id=$id; }
        public function getId(){ return $this->id; }

        /**Descriptores de acceso del atributo usuario */
        public function setUsuario($usuario){ $this->usuario=$usuario; }
        public function getUsuario(){ return $this->usuario; }
        
        /**Descriptores de acceso del atributo contrasena */
        public function setContrasena($contrasena){ $this->contrasena=$contrasena; }
        public function getContrasena(){ return $this->contrasena; }

        /**Descriptores de acceso del atributo nivelUsuario */
        public function setNivelUsuario($nivelUsuario){ $this->nivelUsuario=$nivelUsuario; }
        public function getNivelUsuario(){ return $this->nivelUsuario; }
    }   
?>