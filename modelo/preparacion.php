<?php
    /**
     * Clase de Preparacion
     */

    class Preparacion{
        /**Declaracion de los atributos de preparacion */
        private $id;
        private $paso;
        private $instruccion;
        private $foto;
        private $idPlatillo;

        /**Metodo constructor de Preparacion */
        public function __construct()
        {
            $id=0;
            $paso=0;
            $instruccion="";
            $foto="";
            $idPlatillo=0;
        }

        /**Descriptores de acceso del atriubvuto id */
        public function setId($id){ $this->id=$id;}
        public function getId(){return $this->id;}

        /**Descriptores de acceso del atributo paso */
        public function setPaso($paso){ $this->paso=$paso;}
        public function getPaso(){ return $this->paso;}

        /**Descriptores de acceso del atributo instrucción */
        public function setInstruccion($instruccion){ $this->instruccion=$instruccion;}
        public function getInstruccion(){ return $this->instruccion;}

        /**Descriptores de acceso del atributo foto */
        public function setFoto($foto){ $this->foto=$foto;}
        public function getFoto(){ return $this->foto;}

        /**Descriptores de acceso del atributo idPlatillo */
        public function setIdPlatillo($idPlatillo){ $this->idPlatillo=$idPlatillo;}
        public function getIdPlatillo(){ return $this->idPlatillo;}
    }
?>