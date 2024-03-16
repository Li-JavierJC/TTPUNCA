<?php
    /**
     * Clase de Nutriente
     */
    class Nutriente{
        /**Declaracion de los atributos de Nutriente */
        private $id;
        private $nombre;
        private $cantidadR;
        private $cantidadP;
        private $unidadMedida;
        private $idPlatillo;

        /**Metodo constructor de Nutriente */
        public function __construct()
        {
            $id=0;
            $nombre="";
            $cantidadR="";
            $cantidadP="";
            $unidadMedida="";
            $idPlatillo=0;
        }

        /**Descriptores de acceso del atributo id */
        public function setId($id){ $this->id=$id;}
        public function getId(){ return $this->id;}

        /**Descriptores de acceso del atributo nombre */
        public function setNombre($nombre){ $this->nombre=$nombre;}
        public function getNombre(){ return $this->nombre;}

        /**Descriptores de acceso del atributo cantidadR */
        public function setCantidadR($cantidadR){ $this->cantidadR=$cantidadR;}
        public function getCantidadR(){ return $this->cantidadR;}

        /**Descriptores de acceso del atributo cantidadP */
        public function setCantidadP($cantidadP){ $this->cantidadP=$cantidadP;}
        public function getCantidadP(){ return $this->cantidadP;}

        /**Descriptores de acceso del atributo UnidadMedida */
        public function setUnidadMedida($unidadMedida){ $this->unidadMedida=$unidadMedida;}
        public function getUnidadMedida(){ return $this->unidadMedida;}

        /**Descriptores de acceso del atributo idPlatillo */
        public function setIdPlatillo($idPlatillo){ $this->idPlatillo=$idPlatillo;}
        public function getIdPlatillo(){ return $this->idPlatillo;}
    }
?>