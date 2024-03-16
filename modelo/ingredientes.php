<?php
    /**
     *Clase de ingredientes
     */
    class Ingredientes{
        /**Declacion de los atributos*/
        private $id;
        private $nombre;
        private $cantidad;
        private $unidadMedida;
        private $idPlatillo;

        /**Metodo constructor de la clase Ingredientes */
        public function __construct()
        {   
            $id=0;
            $nombre="";
            $cantidad=0;
            $unidadMedida="";
            $idPlatillo=0;
        }

        /**Descriptores de acceso del atributo id */
        public function setId($id){ $this->id=$id; }
        public function getId(){ return $this->id; }
        
        /**Descripotores de acceso del atributo nombre */
        public function setNombre($nombre){ $this->nombre=$nombre;}
        public function getNombre(){ return $this->nombre;}

        /**Descripotores de acceso del atributo Cantidad */
        public function setCantidad($cantidad){ $this->cantidad=$cantidad;}
        public function getCantidad(){ return $this->cantidad;}

        /**Descriptores de accesoo del atributo unidadMedida */
        public function setUnidadMedida($unidadMedida){ $this->unidadMedida=$unidadMedida;}
        public function getUnidadMedida(){ return $this->unidadMedida; }

        /**Descriptores de acceso del  atributo idPlatillo */
        public function setIdPlatillo($idPlatillo){ $this->idPlatillo=$idPlatillo; }
        public function getIdPlatillo(){return $this->idPlatillo;}
    }
?>

