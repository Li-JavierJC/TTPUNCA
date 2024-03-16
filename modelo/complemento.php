<?php
    /**
     * Clase de Complemento
     */
    class Complemento{
        /**Declaracion de los atributos de Complemento */
        private $id;
        private $estado;
        private $region;
        private $municipio;
        private $lengua;
        private $cultura;
        private $idPlatillo;

        /**Metodo constructor de Complemento */
        public function __construct()
        {
            $id=0;
            $estado="";
            $region="";
            $municipio="";
            $lengua="";
            $cultura="";
            $idPlatillo=0;
        }

        /**Descriptores de acceso del atributo id */
        public function setId($id){ $this->id=$id;}
        public function getId(){ return $this->id;}

        /**Descriptores de acceso del atributo estado */
        public function setEstado($estado){ $this->estado=$estado;}
        public function getEstado(){ return $this->estado;}

        /**Descriptores de acceso del atributo region */
        public function setRegion($region){ $this->region=$region;}
        public function getRegion(){ return $this->region;}
        
        /**Descriptores de acceso del atributo municipio */
        public function setMunicipio($municipio){ $this->municipio=$municipio;}
        public function getMunicipio(){ return $this->municipio;}

        /**Descriptores de acceso del atributo lengua */
        public function setLengua($lengua){ $this->lengua=$lengua;}
        public function getLengua(){ return $this->lengua;}

        /**Descriptores de acceso del atributo cultura */
        public function setCultura($cultura){ $this->cultura=$cultura;}
        public function getCultura(){ return $this->cultura;}

        /**Descriptores de acceso del atributo idPlatillo */
        public function setIdPlatillo($idPlatillo){ $this->idPlatillo=$idPlatillo;}
        public function getIdPlatillo(){ return $this->idPlatillo;}
    }
?>