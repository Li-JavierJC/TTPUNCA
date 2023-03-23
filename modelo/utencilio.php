<?php
    /**
     * Clase de Utencilio
     */
    class Utencilio{
        /**Declaracion de los atributos de Utencilio */
        private $id;
        private $nombre;
        private $cantidad;
        private $idPlatillo;

        /**Metodo constructor de Utencilio */
        public function __construct()
        {
            $id=0;
            $nombre="";
            $cantidad="";
            $idPlatillo=0;
        }

        /**Descriptores de acceso del atributo id */
        public function setId($id){ $this->id=$id;}
        public function getId(){ return $this->id;}

        /**Descriptores de acceso del atributo nombre */
        public function setNombre($nombre){ $this->nombre=$nombre;}
        public function getNombre(){ return $this->nombre;}

        /**Descriptores de acceso del atributo cantidad */
        public function setCantidad($cantidad){ $this->cantidad=$cantidad;}
        public function getCantidad(){ return $this->cantidad;}

        /**Descriptores de acceso del atributo idPlatillo */
        public function setIdPlatillo($idPlatillo){ $this->idPlatillo=$idPlatillo;}
        public function getIdPlatillo(){ return $this->idPlatillo;}
    }
?>