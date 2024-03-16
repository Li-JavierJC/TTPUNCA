<?php
    /**
     * Clase de Validacion 
     */
    class Validacion{
        /**Declaracion de los atributos de Validacion */
        private $id;
        private $idPlatillo;
        private $seccionDatos;
        private $seccionIngredientes;
        private $seccionUtencilio;
        private $seccionPreparacion;
        private $seccionNutriente;
        private $seccionComplemento;
        private $nota;

        /**Metodo constructor de Validacion */
        public function __construct()
        {
            $id=0;
            $idPlatillo=0;
            $seccionDatos=0;
            $seccionIngredientes=0;
            $seccionUtencilio=0;
            $seccionPreparacion=0;
            $seccionNutriente=0;
            $seccionComplemento=0;
            $nota="";
        }

        /**Descriptores de acceso del atributo id */
        public function setId($id){ $this->id=$id;}
        public function getId(){ return $this->id;}

        /**Descriptores de acceso del atributo idPlatillo */
        public function setIdPlatillo($idPlatillo){ $this->idPlatillo=$idPlatillo;}
        public function getIdPlatillo(){ return $this->idPlatillo;}

        /**Descriptores de acceso del atributo seccionDatos */
        public function setSeccionDatos($seccionDatos){ $this->seccionDatos=$seccionDatos;}
        public function getSeccionDatos(){ return $this->seccionDatos;}

        /**Descriptores de acceso del atributo seccionIngredientes */
        public function setSeccionIngredientes($seccionIngredientes){ $this->seccionIngredientes=$seccionIngredientes;}
        public function getSeccionIngredientes(){ return $this->seccionIngredientes;}

        /**Descriptores de acceso del atributo seccionUtencilio */
        public function setSeccionUtencilio($seccionUtencilio){ $this->seccionUtencilio=$seccionUtencilio;}
        public function getSeccionUtencilio(){ return $this->seccionUtencilio;}

        /**Descriptores de acceso del atributo seccionPreparacion */
        public function setSeccionPreparacion($seccionPreparacion){ $this->seccionPreparacion=$seccionPreparacion;}
        public function getSeccionPreparacion(){ return $this->seccionPreparacion;}

        /**Descriptores de acceso del atributo seccionNutriente */
        public function setSeccionNutriente($seccionNutriente){ $this->seccionNutriente=$seccionNutriente;}
        public function getSeccionNutriente(){ return $this->seccionNutriente;}

        /**Descriptores de acceso del atributo seccionComplemento */
        public function setSeccionComplemento($seccionComplemento){ $this->seccionComplemento=$seccionComplemento;}
        public function getSeccionComplemento(){ return $this->seccionComplemento;}

        /**Descriptores de acceso del atributo nota */
        public function setNota($nota){ $this->nota=$nota;}
        public function getNota(){ return $this->nota;}

    }
?>