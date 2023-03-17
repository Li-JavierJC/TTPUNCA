<?php
    /**
     *Clase de ingredientes
     */
    class Ingredientes{
        /**Declacion de los atributos*/
        private $id;
        private $nombre;
        private $unidadMedida;
        private $idAlumno;
        private $idPlatillo;

        /**Metodo constructor de la clase Ingredientes */
        public function __construct()
        {   
            $id=0;
            $nombre="";
            $unidadMedida="";
            $idAlumno=0;
            $idPlatillo=0;
        }

        /**Descriptores de acceso del atributo id */
        public function setId($id){ $this->id=$id; }
        public function getID(){ return $this->id; }
        
        /**Descripotores de acceso del atributo nombre */
        public function setNombre($nombre){ $this->nombre=$nombre;}
        public function getNombre(){ return $this->nombre;}

        /**Descriptores de accesoo del atributo unidadMedida */
        public function setUnidadMedida($unidadMedida){ $this->unidadMedida=$unidadMedida;}
        public function getUnidadMediad(){ return $this->unidadMedida; }

        /**Descriptores de acceso del atributo idAlumno */
        public function setIdAlumno($idAlumno){ $this->idAlumno=$idAlumno; }
        public function getIdAlumno(){ return $this->idAlumno;}

        /**Descriptores de acceso del  atributo idPlatillo */
        public function setIdPlatillo($idPlatillo){ $this->idPlatillo=$idPlatillo; }
        public function getIdPlatillo(){return $this->idPlatillo;}
    }
?>